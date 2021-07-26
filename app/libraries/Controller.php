<?php
class Controller {

    public function view($page,$data=[])
    {
        if(file_exists('../app/views/'.$page.'.php')){
            require_once '../app/views/'.$page.'.php';
        }else{
            die('View not exits');
        }
    }

    public function model($model)
    {
        if(file_exists('../app/models/'.$model.'.php')){
            require_once '../app/models/'.$model.'.php';

            return new $model();
        }else{
            die('Model not found');
        }
    }

}