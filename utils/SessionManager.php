<?php

class SessionManager
{
    public static function isLogged()
    {
        return isset($_SESSION['user']);
    }
}
