<?php

class UserModel
{
    private $_email;
    private $_password;
    private $_connect;

    public function __construct()
    {
        $this->connectDb();
    }

    public function connectDb()
    {
        $dsn = 'mysql:dbname=frameworkmvc;host=127.0.0.1';
        $user = 'root';
        $password = '';

        $this->_connect = new PDO($dsn, $user, $password);
        $this->_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (!$this->_connect) {
            die(mysqli_error($this->_connect));
        }
    }
    public function create($newEmail, $newPassword)
    {
        $checkEmail = $this->_connect->prepare("SELECT email FROM users WHERE email = :email");
        $checkEmail->execute(array(
            "email" => $newEmail
        ));
        $array = $checkEmail->fetch();
        if ($array && count($array) > 0) {
            echo 'Email address already taken';
            die();
        }

        $request = $this->_connect->prepare("INSERT INTO `users` (email, password) VALUES (:email, :password)");
        $request->execute(array(
            "email" => $newEmail,
            "password" => $newPassword
        ));

        $request = $this->_connect->prepare("SELECT id FROM users WHERE email = :email AND password = :password");
        $request->execute(array(
            "email" => $newEmail,
            "password" => $newPassword
        ));
        $row = $request->fetch();
        return $row['id'];
    }

    public function read($id)
    {
        $request = $this->_connect->prepare("SELECT * FROM users WHERE id = :id");
        $request->execute(array(
            "id" => $id,
        ));
        $row = $request->fetch();
        return $row;
    }

    public function update($id)
    {
        $request = $this->_connect->prepare("UPDATE users SET email = :email, password = :password WHERE id = $id");
        $request->execute(array(
            "email" => $this->_email,
            "password" => $this->_password
        ));
    }

    public function delete($id)
    {
        $request = $this->_connect->prepare("DELETE FROM `users` WHERE id = $id");
        $request->execute(array(
            "id" => $id,
        ));
    }

    public function read_all()
    {
        $request = $this->_connect->prepare("SELECT * FROM users");
        $row = $request->fetchAll();
        return $row;
    }

    public function save()
    {
        $this->create($this->_email, $this->_password);
    }

    public function set($email, $password)
    {
        $this->_email = $email;
        $this->_password = $password;
    }

    public function checkUser()
    {
        session_start();
        $isUserMatching = false;

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->_email = $_POST['email'];
            $this->_password = $_POST['password'];

            if (!empty($this->_email) && !empty($this->_password) && !is_numeric($this->_email)) {
                $stmt = $this->_connect->prepare("SELECT * FROM users WHERE email = :email");
                $stmt->execute(array(
                    "email" => $this->_email
                ));
                $row = $stmt->fetch();

                if ($row > 0 && $row['password'] === $this->_password) {
                    $_SESSION['id'] = $row['id'];
                    $isUserMatching = true;
                }
            }
        }
        return $isUserMatching;
    }
}
