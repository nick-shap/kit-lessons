<?php
namespace App\Controller;

use App\Controller;
use App\Http;
use App\Request\UserLoginRequest;
use App\Request\UserRegRequest;
use App\Service\AuthService;
use App\Service\UserService;
use JetBrains\PhpStorm\NoReturn;
use JetBrains\PhpStorm\Pure;

class AuthController extends Controller
{
    private object $userService;
    private object $authService;
    private object $regRequest;
    private object $loginRequest;

    public function __construct()
    {
        parent::__construct();

        $this->userService = new UserService();
        $this->authService = new AuthService();
        $this->regRequest = new UserRegRequest();
        $this->loginRequest = new UserLoginRequest();
    }

    public function loginPage()
    {
        return $this->view->render('Login', []);
    }

    public function regPage()
    {
        return $this->view->render('Reg', []);
    }

    public function reg(): string
    {
        $user = $this->regRequest->validate();

        if (!$this->regRequest->hasError()) {
            $this->userService->userCreate($user);
            $user = [];
        }

        return $this->view->render('Reg', [
            'data'=> $user,
            'message' => [
                'text' => $this->regRequest->getMessageText(),
                'type' => $this->regRequest->getMessageType(),
            ]
        ]);
    }

    public function login(): string
    {
        $user = $this->loginRequest->validate();

        if (!$this->loginRequest->hasError()) {
            $this->authService->userAuth($user);
            Http::redirect('/');
        }

        return $this->view->render('Login', [
            'data'=> $user,
            'message' => [
                'text' => $this->loginRequest->getMessageText(),
                'type' => $this->loginRequest->getMessageType(),
            ]
        ]);
    }

    public function logout()
    {
        $this->session->destroy();
        Http::redirect('/login');
    }
}
