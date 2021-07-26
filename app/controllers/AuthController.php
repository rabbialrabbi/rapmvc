<?php

class AuthController extends Controller {

    public function login()
    {
        $this->view('auth/login');
    }

    public function register()
    {
        var_dump($_POST['email']);
        var_dump($_POST['password']);
        exit();
        $this->view('auth/login');
    }
}
