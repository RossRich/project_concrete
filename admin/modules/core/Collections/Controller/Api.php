<?php

namespace Collections\Controller;

class Api extends \Cockpit\Controller {


    public function find() {

        $options = [];

        if ($filter = $this->param("filter", null)) $options["filter"] = $filter;
        if ($limit  = $this->param("limit", null))  $options["limit"] = $limit;
        if ($sort   = $this->param("sort", null))   $options["sort"] = $sort;
        if ($skip   = $this->param("skip", null))   $options["skip"] = $skip;

        $docs = $this->app->db->find("common/collections", $options);
        
        if (!$this->app->module("auth")->hasaccess("Collections", 'view.all.collections')) {
            $current_user = $this->app->module("auth")->getUser();            
            $my_docs = array();
            foreach($docs as $key => $doc) {
                if (!$this->app->module("auth")->hasaccess("Collections", 'view.all.entries') && !$doc["showtoall"]) {
                    $doc["count"] = $this->app->module("collections")->collectionById($doc["_id"])->find(["_uid" => $current_user["_id"]])->count();
                } else {
                    $doc["count"] = $this->app->module("collections")->collectionById($doc["_id"])->find()->count();
                }
                if ($doc["showtoall"] && $doc["name"]) {
                    $my_docs[] = $doc;
                } elseif (isset($doc["group"])){
                    if ($doc["group"] == "Недвижимость" || $doc["group"] == "Блог") $my_docs[] = $doc;
                }
            }
            return json_encode($my_docs);
        } else {
            if (count($docs) && $this->param("extended", false)){
                foreach ($docs as &$doc) {
                    $doc["count"] = $this->app->module("collections")->collectionById($doc["_id"])->count();
                }
            }
            return json_encode($docs->toArray());
        }
    }

    public function findOne(){

        $doc = $this->app->db->findOne("common/collections", $this->param("filter", []));

        return $doc ? json_encode($doc) : '{}';
    }


    public function save() {

        $collection = $this->param("collection", null);

        if ($collection) {

            $collection["modified"] = time();
            $collection["_uid"]     = @$this->user["_id"];

            if (!isset($collection["_id"])){
                $collection["created"] = $collection["modified"];
            }

            $this->app->db->save("common/collections", $collection);
        }

        return $collection ? json_encode($collection) : '{}';
    }

    public function update(){

        $criteria = $this->param("criteria", false);
        $data     = $this->param("data", false);

        if ($criteria && $data) {
            $this->app->db->update("common/collections", $criteria, $data);
        }

        return '{"success":true}';
    }

    public function remove(){

        $collection = $this->param("collection", null);

        if ($collection) {
            $col = "collection".$collection["_id"];

            $this->app->db->dropCollection("collections/{$col}");
            $this->app->db->remove("common/collections", ["_id" => $collection["_id"]]);
        }

        return $collection ? '{"success":true}' : '{"success":false}';
    }

    public function duplicate(){

        $collectionId = $this->param("collectionId", null);

        if ($collectionId) {

            $collection = $this->app->db->findOneById("common/collections", $collectionId);

            if ($collection) {

                unset($collection['_id']);
                $collection["modified"] = time();
                $collection["_uid"]     = @$this->user["_id"];
                $collection["created"] = $collection["modified"];

                $collection["name"] .= ' (copy)';

                $this->app->db->save("common/collections", $collection);

                return json_encode($collection);
            }
        }

        return false;
    }

    public function entries() {
        
        $current_user = $this->app->module("auth")->getUser();

        $collection = $this->param("collection", null);
        $entries    = [];

        if ($collection) {

            $col     = "collection".$collection["_id"];
            $options = [];

            if ($collection["sortfield"] && $collection["sortorder"]) {
                $options["sort"] = [];
                $options["sort"][$collection["sortfield"]] = (int)$collection["sortorder"];
            }

            
            if ($filter = $this->param("filter", null)) $options["filter"] = is_string($filter) ? json_decode($filter, true) : $filter;
            if ($limit  = $this->param("limit", null))  $options["limit"]  = $limit;
            if ($sort   = $this->param("sort", null))   $options["sort"]   = $sort;
            if ($skip   = $this->param("skip", null))   $options["skip"]   = $skip;
            
            if (!$this->app->module("auth")->hasaccess("Collections", 'view.all.entries') && !$collection["showtoall"]) {
                $options["filter"]['$and'][]["_uid"]['$regex'] = $current_user["_id"];
            }
            
            $entries = $this->app->db->find("collections/{$col}", $options);            
        }

        return json_encode($entries->toArray());
    }

    public function removeentry(){

        $collection = $this->param("collection", null);
        $entryId    = $this->param("entryId", null);
        
        if ($collection && $entryId) {

            $colid = $collection["_id"];
            $col   = "collection".$collection["_id"];

            $this->app->db->remove("collections/{$col}", ["_id" => $entryId]);

            $this->app->helper("versions")->remove("coentry:{$colid}-{$entryId}");
            
            $dir = COCKPIT_DOCS_ROOT."/uploads/".$entryId;
            if (is_dir($dir)) {
                
                function removeDir($dir) {
                    if ($objs = glob($dir."/*")) {
                        foreach($objs as $obj) {
                            is_dir($obj) ? removeDir($obj) : unlink($obj);
                        }
                    }
                    rmdir($dir);
                }
                
                removeDir($dir);
            }
            
        }

        return ($collection && $entryId) ? '{"success":true}' : '{"success":false}';
    }

    public function emptytable(){
        //TODO: сделать удаление папок

        $collection = $this->param("collection", null);

        if ($collection) {

            $collection = "collection".$collection["_id"];

            $this->app->db->remove("collections/{$collection}", []);
        }

        return $collection ? '{"success":true}' : '{"success":false}';
    }

    public function saveentry() {
        
        $collection = $this->param("collection", null);
        $entry      = $this->param("entry", null);
                
        if ($collection && $entry) {

            $entry["modified"] = time();
            //$entry["_uid"]     = @$this->user["_id"];
            if (isset($entry["user_id"])) {
                $entry["_uid"] = $entry["user_id"];
                unset($entry["user_id"]);
            }

            $col = "collection".$collection["_id"];
            
            /* Проверка на уникальность слага
            foreach ($collection["fields"] as $field) {
                if ($field["uniqSlug"]) {
                    $slug_name = $field["name"]."_slug";
                    $slug = $entry[$slug_name];
                }
            }
            */

            if (!isset($entry["_id"])){
                $entry["_uid"]     = @$this->user["_id"];
                $entry["created"] = $entry["modified"];
                
                // Поиск итераторов
                foreach ($collection["fields"] as $field) {
                    if (isset($field["iterator"]) && $field["iterator"] != "") {
                        $iterator_id = $field["iterator"];
                        $iterator = cockpit('datastore:findOne', 'system', ['_id' => $iterator_id]);
                        if ($iterator) {
                            $iterator["iterator"]++;
                            cockpit('datastore:save_entry', 'system', $iterator);
                        }
                        $field_name = $field["name"];
                        $entry[$field_name] = $iterator["iterator"];
                    }
                }
                
            } else {
                if ($this->param("createversion", null)) {
                    $id    = $entry["_id"];
                    $colid = $collection["_id"];                    
                    $this->app->helper("versions")->add("coentry:{$colid}-{$id}", $entry);
                }
            }
                        
            $this->app->db->save("collections/{$col}", $entry);
        }
        
        if ($entry && $this->app->module("auth")->hasaccess("Collections", 'view.all.entries')) {
            $entry["user_id"] = $entry["_uid"];
        }

        return $entry ? json_encode($entry) : '{}';
    }
    
    public function duplicateEntry() {
        
        
        $collectionId = $this->param("collectionId", null);
        $entryId = $this->param("entryId", null);
        
        if (!isset($collectionId) || !isset($entryId)) return '{"success":false, "message": "Не удалось скопировать запись"}';
    
        $entry = $this->app->db->findOneById("collections/collection{$collectionId}", $entryId);
        if (!isset($entry)) return '{"success":false, "message": "Не удалось скопировать запись"}';
        
        unset($entry["_id"]);
        
        // clear photopicker images
        $collection = $this->app->db->findOneById("common/collections", $collectionId);
        foreach($collection["fields"] as $field) {
            if ($field["type"] == "photopicker") {
                if (isset($entry[$field["name"]])) {
                    $entry[$field["name"]] = [];
                }
            }
        }
        
        $this->app->db->save("collections/collection{$collectionId}", $entry);
        
        return $entry ? json_encode(["success" => true, "entry" => $entry]) : '{"success":false, "message": "Не удалось скопировать запись"}';
        
    }

    // Versions

    public function getVersions() {

        $return = [];
        $id     = $this->param("id", false);
        $colid  = $this->param("colId", false);

        if ($id && $colid) {

            $versions = $this->app->helper("versions")->get("coentry:{$colid}-{$id}");

            foreach ($versions as $uid => $data) {
                $return[] = ["time"=>$data["time"], "uid"=>$uid];
            }
        }

        return json_encode(array_reverse($return));

    }


    public function clearVersions() {

        $id     = $this->param("id", false);
        $colid  = $this->param("colId", false);

        if ($id && $colid) {
            return '{"success":'.$this->app->helper("versions")->remove("coentry:{$colid}-{$id}").'}';
        }

        return '{"success":false}';
    }


    public function restoreVersion() {

        $versionId = $this->param("versionId", false);
        $docId     = $this->param("docId", false);
        $colId     = $this->param("colId", false);

        if ($versionId && $docId && $colId) {

            if ($versiondata = $this->app->helper("versions")->get("coentry:{$colId}-{$docId}", $versionId)) {

                $col = "collection".$colId;

                if ($entry = $this->app->db->findOne("collections/{$col}", ["_id" => $docId])) {
                    $this->app->db->save("collections/{$col}", $versiondata["data"]);
                    return '{"success":true}';
                }
            }
        }

        return false;
    }

    public function export($collectionId) {

        if (!$this->app->module("auth")->hasaccess("Collections", 'manage.collections')) {
            return false;
        }

        $collection = $this->app->db->findOneById("common/collections", $collectionId);

        if (!$collection) return false;

        $col     = "collection".$collection["_id"];
        $entries = $this->app->db->find("collections/{$col}");

        return json_encode($entries, JSON_PRETTY_PRINT);
    }

    public function updateGroups() {

        $groups = $this->param("groups", false);

        if ($groups !== false) {

            $this->app->memory->set("cockpit.collections.groups", $groups);

            return '{"success":true}';
        }

        return false;
    }

    public function getGroups() {

        $groups = $this->app->memory->get("cockpit.collections.groups", []);

        return json_encode($groups);
    }
    
    public function getCustomViews() {
        $dir = $this->app->path("custom:views/collections");
        if (!$dir) {
            return json_encode(["success" => false]);
        }
        
        $templates = [];
        
        foreach (new \DirectoryIterator($dir) as $file) {

            if ($file->isDot()) continue;
            if ($file->getExtension() != "php") continue;

            $filename = $file->getFilename();
            $name = $file->getBasename(".php");
            $templates[$filename] = ["name" => $name, "path" => $filename];
            
        }
        
        return json_encode($templates);
    }
}