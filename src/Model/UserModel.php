<?php

class UserModel {

    private $_email;
    private $_password;
    private $_connect;

    public function connectDb() {
        $dsn = 'mysql:dbname=frameworkmvc;host=127.0.0.1';
        $user = 'root';
        $password = '';

        $this->_connect = new PDO($dsn, $user, $password);

        if (!$this->_connect) {
            die(mysqli_error($this->_connect));
        }
    }

    public function save() {
        $request = $this->_connect->prepare("INSERT INTO `users` (email, password) VALUES (:email, :password)");
        $request->execute(array(
            "email" => $this->_email,
            "password" => $this->_password
        ));
    }

    public function set($email, $password) {
        $this->_email = $email;
        $this->_password = $password;
    }

    public function getUser() {
        
    }
}