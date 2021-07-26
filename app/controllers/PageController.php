<?php

class PageController {
    public function __construct()
    {
    }

    public function index()
    {
        echo '<a href="'.SITE_URL.'/login">Click</a>';
    }


}
