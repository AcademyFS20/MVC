<?php
namespace Provider;

    class Renderer
    {
        public static function render($dir,$file,$data=[])
        {
            $path =$_SERVER['DOCUMENT_ROOT'].'/MVC/views/'. $dir.'/';
            // debug($path);
            if(file_exists($path . $file.'.php')){
                include $path . $file . '.php';
            } else {
                return false;
            }
        }
        public static function renderAssets($dir,$file,$sub)
        {
            $path=$_SERVER['DOCUMENT_ROOT'].'/MVC/'.$dir."/$sub/";
        $extensions=array('.css','.js');
        if (file_exists($path.$file.$extensions[0])){
            require_once($path.$file.$extensions[0]);
        }
        else if(file_exists($path.$file.$extensions[1])){
            require_once($path.$file.$extensions[1]);

        } else{
            return false;
        }
        }
        public static function redirectUrl($url, $refreshtime = null)
        {
    
            if (isset($refreshtime)) {
                $header = header('refresh:' . $refreshtime . ';url=' . $url);
            } else {
                $header = header('Location:' . URL . $url);
            }
    
            return $header;
        }

    }