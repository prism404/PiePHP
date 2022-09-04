<?php

namespace Controller;

use UserModel;
use Core;

class UserController extends \Core\Controller
{
    private $_request;

    public function __construct()
    {
        $this->_request = new Core\Request();
    }

    function addAction()
    {
        $this->render('register');
    }

    function registerAction()
    {
        $userModel = new UserModel();
        $userModel->connectDb();

        $email = $this->_request->readPost('email');
        $password = $this->_request->readPostPwdOnly('password');

        if ($email != null && $password != null) {
            $userModel->set($email, $password);
            $userModel->save();
            $this->render('login');
        } else {
            $this->render('register');
        }
    }

    function loginAction()
    {
        if (!isset($_POST['email']) || !isset($_POST['password'])) {
            $this->render('login');
            return;
        }

        $userModel = new UserModel();
        $userModel->connectDb();
        $userModel->set($_POST['email'], $_POST['password']);
        $isMatching = $userModel->checkUser();

        if ($isMatching) {
            $this->render('index');
        } else {
            $this->render('login');
            echo '<p id="invalid">Invalid email or password :(</p>';
        }
    }

    function showLoginAction()
    {
        $this->render('login');
    }

    function deleteUser() {
        $userModel = new UserModel();
        $userModel->connectDb();
        $userModel->delete($_SESSION['id']); 
    }

    function updateUser() {
        $userModel = new UserModel();
        $userModel->connectDb();
        $userModel->update($_SESSION['id']);
    }
}
