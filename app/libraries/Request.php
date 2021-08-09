<?php

namespace App\Libraries;

class Request
{

    private $base = '';
    public $all = [];
    public $httpTyp = 'get';

    public function __construct()
    {
        
        if (isset($_GET['url'])) {
            $this->base = htmlentities($_GET['url']);
            unset($_GET['url']);
        } else {
            $this->base = '/';
        }

        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $this->setParameter($_GET);
            unset($_GET);
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->setParameter($_POST);
            $this->httpTyp = 'post';
            unset($_POST);
        }
    }

    public function baseUrl()
    {
        $base = $this->base;
        $this->base = '';
        return $base;
    }

    public function setParameter($params)
    {
        foreach ($params as $k => $param) {
            $this->$k = $param;
            $this->all[$k] = htmlentities($params[$k]);
        }
    }

    public function httpType()
    {
        return $this->httpTyp;
    }

    public function all()
    {
        return $this->all;
    }
}