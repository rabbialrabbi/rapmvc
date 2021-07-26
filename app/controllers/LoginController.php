<?php

class LoginController extends Controller {

    public function __construct()
    {
        $this->session = new Session();
    }

    public function index()
    {
        $this->view('auth/login');
    }

    public function verify()
    {
        $auth = $this->model('Auth');

        $is_auth = $auth->authCheck($_POST);
        if($is_auth){
            $this->session->set('email',$_POST['email']);
            header("location: ".$_SERVER['HTTP_REFERER']);
        }else{
            header("location: ".SITE_URL."/login");
        }
    }
}
