<?php

namespace Mediamanager\Controller;

class Mediamanager extends \Cockpit\Controller {

	protected $root;

	public function index(){

        if (!$this->app->module("auth")->hasaccess("Mediamanager","manage")) return false;

        return $this->render("mediamanager:views/index.php");
	}

    public function thumbnail($image, $width = 50, $height = 50) {

        $image  = base64_decode($image);
        $imgurl = $this->app->module("mediamanager")->thumbnail($image, $width, $height);
        $fail   = (strpos($imgurl, 'data:')===0);
        $type   = 'gif';
        $data   = base64_decode('R0lGODlhAQABAJEAAAAAAP///////wAAACH5BAEHAAIALAAAAAABAAEAAAICVAEAOw=='); // empty 1x1 gif

        if (!$fail) {

            $info = pathinfo($imgurl);
            $type = $info['extension'];
            $data = file_get_contents($this->app['docs_root'].$imgurl);
        }

        header("Content-type: image/{$type}");
        $this->app->stop($data);
    }


    public function api() {
        $cmd       = $this->param("cmd", false);
        $mode = $this->param("mode", false);
        $entry_id = $this->param("entry_id", false);
        
        if ($mode == "entry" && $entry_id != false) {
            $mediapath = "/uploads/".$entry_id;
            if (!is_dir(COCKPIT_DOCS_ROOT.$mediapath)) mkdir(COCKPIT_DOCS_ROOT.$mediapath);
        } else {
            $mediapath = trim($this->module("auth")->getGroupSetting("media.path", '/'), '/');
            $current_user = $this->app->module("auth")->getUser();
            $mediapath = preg_replace('/{user_id}/', $current_user["_id"], $mediapath);
        }
        
        $this->root = rtrim($this->app->path("site:{$mediapath}"), '/');
        
        if (file_exists($this->root) && in_array($cmd, get_class_methods($this))){
            return $this->{$cmd}();
        }

        return false;
    }
    
    protected function temp_folder() {
        $temp_folder = $this->param("temp_folder", false);
        if ($temp_folder == "false") $temp_folder = false;
        // Проверяем существование папки, если ее нет, то создаем
        $dir_name = uniqid();
        if ($temp_folder) {
            $dir_name = false;
            if (!is_dir($this->root."/".$temp_folder)) 
                mkdir($this->root."/".$temp_folder);
        }
        // Создаем временную папку
        if ($dir_name) {
            mkdir($this->root."/".$dir_name);
            $temp_folder = $dir_name;
        }
        return json_encode(["temp_folder" => $temp_folder, "root_path" => $this->root]);
    }

    protected function ls() {

        $data     = array("folders"=>array(), "files"=>array());
        $toignore = [
            '.svn', '_svn', 'cvs', '_darcs', '.arch-params', '.monotone', '.bzr', '.git', '.hg',
            '.ds_store', '.thumb'
        ];

		if ($path = $this->param("path", false)){

            $dir = $this->root.'/'.trim($path, '/');
            $data["path"] = $dir;

            if (file_exists($dir)){

               foreach (new \DirectoryIterator($dir) as $file) {

               		if ($file->isDot()) continue;

                    $filename = $file->getFilename();

                    if ($filename[0]=='.' && in_array(strtolower($filename), $toignore)) continue;

                    $isDir = $file->isDir();

                    $data[$file->isDir() ? "folders":"files"][] = array(
                        "is_file" => !$isDir,
                        "is_dir" => $isDir,
                        "is_writable" => is_writable($file->getPathname()),
                        "name" => $filename,
                        "path" => trim($path.'/'.$file->getFilename(), '/'),
                        "url"  => $this->app->pathToUrl($file->getPathname()),
                        "size" => $isDir ? "" : $this->app->helper("utils")->formatSize($file->getSize()),
                        "ext"  => $isDir ? "" : strtolower($file->getExtension()),
                        "lastmodified" => $file->isDir() ? "" : date("d.m.y H:i", $file->getMTime()),
                    );
                }
            }
        }

    	return json_encode($data);
    }

    protected function upload() {
        
        $mode = $this->param('mode', false);
        $path = $this->param('path', false);
        $uniq = $this->param('uniq', false);
        
        if ($mode == "temp_folder") {
            // Создаем временную папку
            if (!$path) {
                $path = uniqid();
                // TODO: добавить проверку на админа, ему добавлять особый путь
                mkdir($this->root."/".trim($path, '/'));
            } else {
                if (!file_exists($this->root."/".trim($path, '/'))) mkdir($this->root."/".trim($path, '/'));
            }
        }

        $files      = isset($_FILES['files']) ? $_FILES['files'] : [];
        
        $targetpath = $this->root.'/'.trim($path, '/');
        $uploaded   = [];
        $failed     = [];

        if (isset($files['name']) && $path && file_exists($targetpath)) {
            for ($i = 0; $i < count($files['name']); $i++) {
                $result = false;
                
                // filename
                if ($uniq) {
                    $clean = pathinfo($files['name'][$i]);
                    $clean = uniqid().".".strtolower($clean["extension"]);
                } else 
                    $clean = preg_replace('/[^a-zA-Z0-9-_\.]/','', str_replace(' ', '-', $files['name'][$i]));

                
                if (!$files['error'][$i]) {                    
                    $size = getimagesize($files['tmp_name'][$i]);
                    
                    if ($size[0] < 1600 && $size[1] < 1600) {
                        $result = move_uploaded_file($files['tmp_name'][$i], $targetpath.'/'.$clean);
                    } else {
                        $k = 1;
                        if ($size[0] > $size[1]) {
                            $k = 1600 / $size[0];
                        } else {
                            $k = 1600 / $size[1];
                        }
                        $width = ceil($k * $size[0]);
                        $height = ceil($k * $size[1]);
                        if ($witdh > 1600) $width = 1600;
                        if ($height > 1600) $height = 1600;
                        
                        $image = imagecreatefromjpeg($files['tmp_name'][$i]);
                        $image_p = imagecreatetruecolor($width, $height);
                        
                        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
                        $result = imagejpeg($image_p, $targetpath.'/'.$clean, 80);
                    }                    
                }
                
                if ($result) {
                    $uploaded[] = $clean;                    
                } else {
                    $failed[] = $files['name'][$i];
                }
            }
        }

        return json_encode(['uploaded' => $uploaded, 'failed' => $failed, 'path' => $path]);
    }

    protected function createfolder() {

        $path = $this->param('path', false);
        $name = $this->param('name', false);
        $ret  = false;

        if ($name && $path) {
            $ret = mkdir($this->root.'/'.trim($path, '/').'/'.$name);
        }

        return json_encode(array("success"=>$ret));
    }

    protected function createfile() {

        $path = $this->param('path', false);
        $name = $this->param('name', false);
        $ret  = false;

        if ($name && $path) {
            $ret = @file_put_contents($this->root.'/'.trim($path, '/').'/'.$name, "");
        }

        return json_encode(array("success"=>$ret));
    }

    protected function removefiles() {

        $paths = (array)$this->param('paths', array());

        foreach ($paths as $path) {
            
            if (substr($path, 0, 5) == "site:") $delpath = $this->app->path("site:").trim(substr($path, 5), '/');
            else $delpath = $this->root.'/'.trim($path, '/');
            
            if (is_dir($delpath)) {
                $this->_rrmdir($delpath);
            }

            if (is_file($delpath)){
                unlink($delpath);
            }
        }

        return json_encode(array("success"=>true));
    }        

    protected function _rrmdir($dir) {

        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir") $this->_rrmdir($dir."/".$object); else unlink($dir."/".$object);
                }
            }

            reset($objects);
            rmdir($dir);
        }
    }

    // Вернуть как было в коробке
    protected function rename() {

        $path = $this->param('path', false);
        $dest = $this->param('dest', false);
        $name = $this->param('name', false);
        
        if ($path && $name) {
            $source = $this->root.'/'.trim($path, '/');
            if ($dest) {
                if (substr($dest, 5) != "site:") $dest = $this->app->path("site:").trim(substr($dest, 5), '/');
                if (!is_dir($dest)) mkdir($dest);
                $target = $dest.'/'.$name;
            } else $target = dirname($source).'/'.$name;

            rename($source, $target);
        }

        return json_encode(array("success"=>true));
    }
    
    protected function movefiles() {
        $path = $this->param('path', false);
        $dest = $this->param('dest', false);
        $files = $this->param('files', false);
        $remove_source_dir = $this->param('dest', false);
        if ($remove_source_dir == "true") $remove_source_dir = true;
        
        if ($path && $dest) {
            if (substr($path, 0, 5) == "site:") $path = $this->app->path("site:").trim(substr($path, 5), '/');
            if (substr($dest, 0, 5) == "site:") $dest = $this->app->path("site:").trim(substr($dest, 5), '/');
            if (!is_dir($dest)) mkdir($dest);
            foreach($files as $file) {
                $source = $path."/".$file;
                $target = $dest."/".$file;
                rename($source, $target);
            }
            if ($remove_source_dir) {
                $this->_rrmdir($path);
            }
        }
        else return json_encode(array("success"=>false));
        
        return json_encode(array("success"=>true));
    }
    
    protected function readfile() {

        $path = $this->param('path', false);
        $file = $this->root.'/'.trim($path, '/');

        if ($path && file_exists($file)) {
            echo file_get_contents($file);
        }

        $this->app->stop();
    }

    protected function writefile() {

        $path    = $this->param('path', false);
        $content = $this->param('content', false);
        $file    = $this->root.'/'.trim($path, '/');
        $ret     = false;

        if ($path && file_exists($file) && $content!==false) {
            $ret = file_put_contents($file, $content);
        }

        return json_encode(array("success"=>$ret));
    }

    protected function unzip() {

        $return  = ['success' => false];

        $path    = $this->param('path', false);
        $zip     = $this->param('zip', false);

        if ($path && $zip) {

            $path =  $this->root.'/'.trim($path, '/');
            $zip  =  $this->root.'/'.trim($zip, '/');

            $za = new \ZipArchive;

            if ($za->open($zip)) {

                if ($za->extractTo($path)) {
                    $return = ['success' => true];
                }

                $za->close();
            }
        }

        return json_encode($return);
    }

    protected function download() {

        $path = $this->param('path', false);
        $file = $this->root.'/'.trim($path, '/');

        if (!$path && !file_exists($file)) {
            $this->app->stop();
        }

        $pathinfo = $path_parts = pathinfo($file);

        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
        header("Content-Type: application/force-download");
        header("Content-Disposition: attachment; filename=\"".$pathinfo["basename"]."\";" );
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: ".filesize($file));
        readfile($file);

        $this->app->stop();
    }

    protected function getfilelist() {

        $list = [];
        $toignore = [
            '\.svn', '_svn', 'cvs', '_darcs', '\.arch-params', '\.monotone', '\.bzr', '\.git', '\.hg', '\.ds_store', '\.thumb', '\/cache'
        ];

        $toignore = '/('.implode('|',$toignore).')/i';

        foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->root)) as $file) {

            if ($file->isDir()) continue;

            $filename = $file->getFilename();

            if ($filename[0]=='.' || preg_match($toignore, $file->getPathname())) continue;

            $path = trim(str_replace(['\\', $this->root], ['/',''], $file->getPathname()), '/');

            $list[] = [
                "is_file" => true,
                "is_dir" => false,
                "is_writable" => is_writable($file->getPathname()),
                "name" => $filename,
                "path" => $path,
                "dir" => dirname($path),
                "url"  => $this->app->pathToUrl($file->getPathname()),
            ];
        }

        return json_encode($list);
    }

    public function savebookmarks() {

        if ($bookmarks = $this->param('bookmarks', false)) {
            $this->memory->set("mediamanager.bookmarks.".$this->user["_id"], $bookmarks);
        }

        return json_encode($bookmarks);
    }

    public function loadbookmarks() {

        return json_encode($this->app->memory->get("mediamanager.bookmarks.".$this->user["_id"], ["folders"=>[], "files"=>[]]));
    }

}
