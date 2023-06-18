<?php
namespace App;

use JetBrains\PhpStorm\Pure;

class Controller
{
    public object $view;
    public object $session;

    public function __construct()
    {
        $this->view = new View();
        $this->session = new Session();
    }

}