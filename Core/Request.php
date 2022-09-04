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
            $result = filter_var($result, FILTER_SANITIZE_EMAIL);
            $result = strip_tags($result);
        } else {
            return null;
        }

        if (filter_var($result, FILTER_VALIDATE_EMAIL)) {
            echo '<p id="invalid">Enter your ' . $input . '</p>';
        } else {
            echo '<p id="invalid">Your ' . $input . ' isnt a valid email address</p>';
            return null;
        }

        return $result;
    }

    public function readPostPwdOnly($input)
    {
        if (!isset($_POST[$input])) {
            return null;
        }

        $result = $_POST[$input];
        if (!empty($result)) {
            strip_tags($result);
            password_hash($result, PASSWORD_DEFAULT);
        } else {
            return null;
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
