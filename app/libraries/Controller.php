<?php

namespace App\Libraries;

class Controller {

    public function view($page,$data=[])
    {
        if(file_exists('../app/Views/'.$page.'.php')){
            require_once '../app/Views/'.$page.'.php';
        }else{
            die('View not exits');
        }
    }

    public function model($model)
    {
        if(file_exists('../app/Models/'.$model.'.php')){
            require_once '../app/Models/'.$model.'.php';

            return new $model();
        }else{
            die('Model not found');
        }
    }

}