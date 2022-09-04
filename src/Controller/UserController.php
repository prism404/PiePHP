<?php

namespace Controller;

use UserModel;

class UserController extends \Core\Controller
{

    public function __construct()
    {
    }

    function addAction()
    {
        $this->render('register');
    }

    function registerAction()
    {
        $userModel = new UserModel();
        $userModel->connectDb();
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $userModel->set($_POST['email'], $_POST['password']);
            $userModel->save();
            $this->render('login');
        }
    }

    function loginAction()
    {
        $userModel = new UserModel();
        $userModel->connectDb();
        $userModel->set($_POST['email'], $_POST['password']);

        $noMatch = true;

        if ($noMatch) {
            $this->render('login');
            echo 'Invalid identifiants';
        }
    }

    function showLoginAction()
    {
        $this->render('login');
    }
}
