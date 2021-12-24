<?php

namespace Provider;

class Session
{

    public static function setFlash($key = "", $message = "")
    {

        $_SESSION['flash'][$key] = $message;
    }

    public static function getFlash($key = '')
    {
        return $_SESSION['flash'][$key] ?? false;
    }

    public static function isSession($key = "")
    {

        return isset($_SESSION['flash'][$key]) ? true : false;
    }
    public static function destroy()
    {

        session_destroy();
    }

    public static function destructFlash()
    {

        unset($_SESSION['flash']);
    }

}
