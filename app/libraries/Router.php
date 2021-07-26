<?php

class Router {
    public static $url =[];

    public static function get($url,$controller)
    {
        self::$url[]=['http_type'=>'get','url'=>$url,'controller'=>$controller];
    }
}