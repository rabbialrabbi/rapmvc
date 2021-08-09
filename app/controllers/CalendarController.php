<?php

namespace App\Controller ;
use App\Libraries\Controller ;

class CalendarController extends Controller
{
    public function index($request)
    {
        echo 'In Calendar Controller :';
        echo '<pre>';
        print_r($request->all);
        echo '</pre>';

    }

}