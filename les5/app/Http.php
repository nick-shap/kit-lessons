<?php

namespace App;

class Http
{
    public static function redirect($page)
    {
        header('Location: ' . APP_URL . $page);
        exit();
    }
}