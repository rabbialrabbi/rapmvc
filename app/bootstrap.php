<?php

include_once 'config/config.php';

spl_autoload_register(function ($className) {
    include_once 'libraries/' . $className . '.php';
});

new Core;