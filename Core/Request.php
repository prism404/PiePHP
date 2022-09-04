<?php

namespace Core;

class Request
{

    public function __construct()
    {
    }

    public function readPost($input)
    {
        if (!isset($_POST[$input])) {
            return null;
        }

        $result = $_POST[$input];

        if (!empty($result)) {
            // process email here
            filter_var($input, FILTER_SANITIZE_EMAIL);
            strip_tags($input);
        }

        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            echo '<p id="invalid">Enter your ' . $input . '</p>';
        } else {
            echo '<p id="invalid">Your ' . $input . ' isnt a valid email address</p>';
        }

        return $result;
    }

    public function readPostPwdOnly($input)
    {
        if (!isset($_POST[$input])) {
            return null;
        }

        $result = $_POST[$input];
        if (!empty($_POST[$input])) {
            strip_tags($input);
            password_hash($input, PASSWORD_DEFAULT);
        }

        return $result;
    }

    public function readGet($input)
    {
        if (!isset($_GET[$input])) {
            return null;
        }
        $result = $_GET[$input];
        // process password results ...

        return $result;
    }
}
