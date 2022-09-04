<?php

spl_autoload_register('autoloader');

function autoloader($myClass) {

    if(file_exists($myClass . '.php')) {
        require $myClass . '.php';
    } else {
        require 'src\\' . $myClass . '.php';
    }
}
