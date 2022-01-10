<?php

namespace App;
use \App\Models\Users;

class Auth
{
    public static function login($username, $password)
    {
        $allUsers = Users::getAll();
        foreach ($allUsers as $user) {
            if ($username == $user->getUserName() && password_verify($password,  $user->getPassword())) {
                $_SESSION['userID'] = $user->getId();
                return true;
            }
        }
        return false;
    }

    public static function logout()
    {
        unset($_SESSION['userID']);
        session_destroy();
    }

    public static function isLogged()
    {
        return isset($_SESSION['userID']);
    }

    public static function getName()
    {
        return (Auth::isLogged() ? $_SESSION['name'] . ' ' . $_SESSION['surname'] : "");
    }
}