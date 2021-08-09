<?php

namespace App\Libraries;

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function get($key)
    {
        return $_SESSION[$key];
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function remove($key)
    {
        $_SESSION[$key] = '';
    }

    public function isLogin()
    {
        if (!$this->get('email')) {
            header("location: " . SITE_URL . "/login");
        }

    }
}