<?php
namespace App;

use App\Service\AuthService;
use JetBrains\PhpStorm\Pure;

class Middleware
{
    private object $auth;
    private array $authRoutes = ['/login', '/reg'];

    public function __construct()
    {
        $this->auth = new AuthService();
    }

    public function isAuth($url)
    {
        $userID = $this->auth->getUserID();

        if (is_null($userID) && !in_array($url, $this->authRoutes, true)) {
            Http::redirect('/login');
        }

        if (!is_null($userID) && in_array($url, $this->authRoutes, true)) {
            Http::redirect('/');
        }
    }
}
