<?php

namespace App;

class Main
{
    private object $router;

    public function __construct()
    {
        $this->router = new Router;
    }

    public function init()
    {
        $routes = [
            '/' => 'homeAction',
            '/calc' => 'calcAction',
            '/square' => 'squareAction',
        ];

        $this->router->setRoutes($routes);
        $this->router->run();

        echo $this->router->getContent();
    }
}
