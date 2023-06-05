<?php

namespace App;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;

class Router
{
    private object $router;
    private ?string $data;

    public function __construct()
    {
        $this->router = new RouteCollector();
    }

    public function init()
    {
        $this->addRoutes();
        $this->dispatch();
    }

    private function addRoutes()
    {
        $this->router->get('/', ['App\Controller\HomeController', 'index']);
        $this->router->get('/articles', ['App\Controller\ArticleController', 'index']);
        $this->router->get('/article/{id}', ['App\Controller\ArticleController', 'detail']);
        $this->router->get('/404', ['App\Controller\ErrorController', 'notFound']);
    }

    private function dispatch()
    {
        $dispatcher = new Dispatcher($this->router->getData());
        $url = str_replace(APP_NAME, '', $_SERVER['REQUEST_URI']);

        try {
            $this->data = $dispatcher->dispatch($_SERVER['REQUEST_URI'], $url);
        } catch (HttpRouteNotFoundException | ModelNotFoundException) {
            Http::redirect('/404');
        }
    }

    public function getData()
    {
        return $this->data;
    }
}