<?php

namespace Collections\Controller;

class Collections extends \Cockpit\Controller {


	public function index() {
		return $this->render("collections:views/index.php");
	}

    public function collection($id = null) {

        if (!$this->app->module("auth")->hasaccess("Collections", 'manage.collections')) {
            return false;
        }

        $locales = $this->app->db->getKey("cockpit/settings", "cockpit.locales", []);

        return $this->render("collections:views/collection.php", compact('id', 'locales'));
    }


    public function entries($id) {

        $collection = $this->app->db->findOne("common/collections", ["_id" => $id]);

        if (!$collection) {
            return false;
        }

        $count = $this->app->module("collections")->collectionById($collection["_id"])->count();

        $collection["count"] = $count;
        
        $viewPath = "collections:views/entries.php";
        
        $customViewPath = $this->app->path("custom:views/collections/".((isset($collection["customView"]) && $collection["customView"] != "") ? $collection["customView"] : "NULL"));
        
        if ($customViewPath) $viewPath = "custom:views/collections/{$collection["customView"]}";
        
        return $this->render($viewPath, compact('id', 'collection', 'count'));
    }

    public function entry($collectionId, $entryId=null) {

        $collection = $this->app->db->findOne("common/collections", ["_id" => $collectionId]);
        
        if ($this->app->module("auth")->hasaccess("Collections", 'manage.collections')) {
        
            $user = array();
            $user["name"] = "user_id";
            $user["type"] = "select";
            $user["lst"] = true;
            $user["required"] = false;
            $user["label"] = "Риэлтор";
            $user["options"] = array();
            $user["tab"] = "side";

            $accounts = $this->app->db->find("cockpit/accounts", [
                "filter" => ["group"=>"agent"],
                "sort"   => ["user" => 1]
            ])->toArray($accounts);

            foreach ($accounts as $agent) {
                $name = $agent["lastname"]." ".$agent["name"]." ".$agent["secondname"];
                $user["options"][] = array("key" => $agent["_id"], "value" => $name);
            }

            //$collection["fields"][] = $user;
        }
        
        $entry      = null;

        if (!$collection) {
            return false;
        }

        if ($entryId) {
            $col   = "collection".$collection["_id"];
            $entry = $this->app->db->findOne("collections/{$col}", ["_id" => $entryId]);
            
            if ($this->app->module("auth")->hasaccess("Collections", 'manage.collections')) {
                foreach ($user["options"] as $key => $value) {
                    if ($value["key"] == $entry["_uid"]) {
                        $entry["user_id"] = $entry["_uid"];
                        break;
                    }
                }
            }
            
            if (!$entry) {
                return false;
            }
        }

		$locales = $this->app->db->getKey("cockpit/settings", "cockpit.locales", []);

        return $this->render("collections:views/entry.php", compact('collection', 'entry', 'locales'));

    }

}
