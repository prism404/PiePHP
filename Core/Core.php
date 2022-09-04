<?php

namespace Core;

use Controller\UserController;
use Controller\AppController;
use Controller\ErrorController;

class Core
{

    private function routingStatic($url)
    {
        // ROUTER STATIC
        $route = Router::get($url);
        $controller = null;
        $errorController = new ErrorController();
        if ($route != null) {
            if ($route['controller'] == 'user') {
                $controller = new UserController;
            } else if ($route['controller'] == 'app') {
                $controller = new AppController;
            } else {
                $errorController->Error404Action();
                die();
            }
            if ($route['action'] == 'add') {
                $controller->addAction();
            } else if ($route['action'] == 'registerAction') {
                $controller->registerAction();
            } else if ($route['action'] == 'loginAction') {
                $controller->loginAction();
            } else if ($route['action'] == 'index') {
                $controller->indexAction();
            } else {
                $errorController->Error404Action();
                die();
            }
        } else {
            $errorController->Error404Action();
            die();
        }
    }

    private function routingDynamic($url)
    {
        // ROUTER DYNAMIC
        $route = Router::getDynamic($url);
        $controller = null;
        $errorController = new ErrorController();

        if ($route['controller'] == null || $route['controller'] == 'app') {
            $controller = new AppController;
        } else if ($route['controller'] == 'user') {
            $controller = new UserController;
        } else {
            $errorController->Error404Action();
            die();
        }

        if ($route['action'] == null || $route['action'] == 'index') {
            $controller->indexAction();
        } else if ($route['action'] == 'registerAction') {
            $controller->registerAction();
        } else if ($route['action'] == 'loginAction') {
            $controller->loginAction();
        } else if ($route['action'] == 'add') {
            $controller->addAction();
        } else {
            $errorController->Error404Action();
            die();
        }
    }

    public function run()
    {
        // echo __CLASS__ . "[OK]" . PHP_EOL;
        require 'src/routes.php';
        $fullUrl = $_SERVER['REQUEST_URI'];
        $fullUrl = substr($fullUrl, strlen(BASE_URI));

        // not sure
        if ($fullUrl == '/index.php') {
            $controller = new AppController;
            $controller->indexAction();
            return;
        }

        $useRooterStatic = true;

        if ($useRooterStatic) {
            self::routingStatic($fullUrl);
        } else {
            self::routingDynamic($fullUrl);
        }
    }
}
