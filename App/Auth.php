<?php

namespace App;
use \App\Models\Registration;

class Auth
{
    public static function login($username, $password)
    {
        $allUsers = Registration::getAll();
        foreach ($allUsers as $user) {
            if ($username == $user->getUserName() && $password == $user->getPassword()) {
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

    public function getName()
    {
        return (Auth::isLogged() ? $_SESSION['name'] . ' ' . $_SESSION['surname'] : "");
    }
}