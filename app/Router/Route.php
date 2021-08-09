<?php
namespace App\Router;

use App\Libraries\Router;

class Route extends Router{

    public function routes()
    {
        parent::get('/',['CalendarController','index']);
        parent::get('/home',['HomeController','index']);
        parent::get('/calendar',['CalendarController','index']);
        parent::get('test',['TestController','index']);
    }
}

