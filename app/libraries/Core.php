<?php

namespace App\Libraries;


use App\Router\Route;

class Core
{

    protected $currentController = 'PageController';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        try {


            $route = (new Route())->routes();
            $request = new Request();

            $controller = strtolower($request->baseUrl());
            $route = Router::getURL($request->httpType(), $controller);
            $this->currentController = $route['controller'];
            $this->currentMethod = $route['method'];

            $this->params['request'] = $request;

            /*Check and include current controller*/
//            echo $this->currentController;
            if (file_exists('../app/Controllers/' . ucwords($this->currentController) . '.php')) {
                $className = "\\App\\Controllers\\".$this->currentController;
                $this->currentController = new $className;
            } else {
                throw new \Exception('Controller not found');
            }
            /*Check method exists */
            if (!method_exists($this->currentController, $this->currentMethod)) {
                throw new \Exception('Method not found');
            }

            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

        } catch (\Exception $e) {
            echo $e->getMessage() . "\n";
        }


    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url, 2);
            return $url;
        }
    }

}