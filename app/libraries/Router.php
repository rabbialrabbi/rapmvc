<?php

namespace App\Libraries;

class Router
{
    public static $get = [];
    public static $post = [];

    public static function get($route, $controller)
    {
        $routeTrims = $route;
        if(substr($routeTrims, 0,1) == '/') {
            $routeTrims = substr($route, 1);
        }
        $routeTrims = strtolower($routeTrims);
        self::$get[$routeTrims] = [
            'controller' => $controller[0],
            'method' => $controller[1],
            'url' => $route,
        ];
    }

    public static function post($route, $controller)
    {
        self::$post[$route] = [
            'controller' => $controller[0],
            'method' => $controller[1],
            'url' => $route,
        ];
    }

    public static function getURL($httpType, $route)
    {
        if ($httpType == 'get') {
            if (array_key_exists($route, self::$get)) {
                return self::$get[$route];
            } else {
                throw new \Exception('Route not Found');
            }
        } elseif ($httpType == 'post') {
            if (array_key_exists($route, self::$post)) {
                return self::$post[$route];
            } else {
                throw new \Exception('Route not Found');
            }
        }

    }
}