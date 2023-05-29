<?php

namespace App;

class Router
{
    private array $routes;
    private object $controller;
    private string $content;
    private object $request;

    public function __construct(){
        $this->controller = new Controller;
        $this->request = new Request;
    }

    public function setRoutes(Array $routes)
    {
        $this->routes = $routes;
    }

    public function run()
    {
        $url = $this->getUrl();
        $currentRoute = str_replace('http://localhost/les4', '', $url);

        $method = $this->routes[$currentRoute] ?? 'notFound';

        if (method_exists($this->controller, $method)) {
            $this->content = $this->controller->{$method}($this->request);
        } else {
            $this->content = $this->controller->notFoundAction();;
        }


    }

    public function getContent()
    {
        return $this->content;
    }

    private function getURL(): string
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? "https" : "http";
        return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }
}