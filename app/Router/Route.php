<?php
namespace App\Router;

use App\Libraries\Router;

class Route extends Router{

    public function routes()
    {
        parent::get('/',['HomeController','index']);
    }
}

