<?php
namespace App\Controller;

use App\Controller;
use App\Model\User;

class UserController extends Controller
{
    public function index(): string
    {
        return $this->view->render('Users', [
            'users' => User::get(),
        ]);
    }
}
