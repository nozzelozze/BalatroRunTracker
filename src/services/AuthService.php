<?php

class AuthService
{

    public static function login($data = null)
    {
        session_start();
        $_SESSION["Name"] = "TestName";
        header("Location: /");
    }

    public static function logout($data = null)
    {
        if (session_status() === PHP_SESSION_ACTIVE)
        {
            session_destroy();
        }
        header("Location: /");
    }
}

?>