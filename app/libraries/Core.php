<?php

class Core
{

    protected $currentController = 'PageController';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();


        // Update Current controller
        if (file_exists('../app/controllers/' . ucwords($url[0]) . 'Controller.php')) {
            $this->currentController = ucwords($url[0]) . 'Controller';
            unset($url[0]);
        }
        //include current controller
        include_once '../app/controllers/' . ucwords($this->currentController) . '.php';

        $this->currentController = new $this->currentController();

        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
            }
            unset($url[1]);
        }


        $this->params = $url ? array_values($url) : [];

        /* edo create exception for not set method*/
        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);


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