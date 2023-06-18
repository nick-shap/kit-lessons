<?php
namespace App\Controller;

use App\Controller;

class HomeController extends Controller
{
    public function index(): string
    {
        return $this->view->render('Home', [
            'usersURL' => APP_URL . '/users',
            'articlesURL'=> APP_URL . '/articles',
            'logoutURL'=> APP_URL . '/logout'
        ]);
    }
}
