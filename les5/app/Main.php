<?php

namespace App;

class Main
{
    private object $database;
    private object $router;

    public function __construct()
    {
        $this->database = new Database();
        $this->router = new Router();
    }

    public function init()
    {
        $this->database->init();
        $this->router->init();

        echo$this->router->getData();
    }
}