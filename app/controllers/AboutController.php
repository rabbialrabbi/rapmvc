<?php

class AboutController extends Controller {

    public $post ;

    public function __construct()
    {
        $this->session = new Session();
        $this->post = $this->model('Post');
    }

    public function about()
    {
        $this->session->isLogin();
//        $this->session->remove('email');

        $this->post->getPosts();

        $data = [
            'posts' => $this->post->getPosts(),
        ];

        $this->view('about/index',$data);
    }
}
