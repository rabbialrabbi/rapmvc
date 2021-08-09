<?php


namespace App\Controllers;

use App\Libraries\Controller;

class TestController extends Controller
{
    public function index()
    {
        echo '<pre>';
        print_r('Hi');
        echo '</pre>';
        
    }
}