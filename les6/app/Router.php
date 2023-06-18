<?php
namespace App;

use App\Service\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;

class Router
{
    private object $router;
    private ?string $data;
    public object $middleware;

    public function __construct()
    {
        $this->router = new RouteCollector();
        $this->middleware = new Middleware();
    }

    public function init()
    {

        $this->addRoutes();
        $this->dispatch();
    }

    private function addRoutes()
    {
        require_once '../routes.php';

        foreach ($routes as $route) {
            $this->router->{$route['method']}($route['url'], [$route['controller'], $route['action']]);
        }
    }

    private function dispatch()
    {
        $dispatcher = new Dispatcher($this->router->getData());
        $url = str_replace(APP_NAME.'/', '', $_SERVER['REQUEST_URI']);

        $this->middleware->isAuth($url);

        try {
            $this->data = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);
        } catch (HttpRouteNotFoundException | ModelNotFoundException) {
            Http::redirect('/404');
        }
    }

    public function getData(): ?string
    {
        return $this->data;
    }
}
