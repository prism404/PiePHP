<?php

namespace Controller;

class ErrorController extends \Core\Controller
{

    public function __construct()
    {
    }

    public function error404Action()
    {
        $this->render('404');
    }
}
