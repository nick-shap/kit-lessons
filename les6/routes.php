<?php
$routes = [
    [
        'url' => '/',
        'controller' => 'App\Controller\HomeController',
        'action' => 'index',
        'method'=> 'get'
    ],
    [
        'url' => 'login',
        'controller' => 'App\Controller\AuthController',
        'action' => 'loginPage',
        'method'=> 'get'
    ],
    [
        'url' => 'login',
        'controller' => 'App\Controller\AuthController',
        'action' => 'login',
        'method'=> 'post'
    ],
    [
        'url' => 'logout',
        'controller' => 'App\Controller\AuthController',
        'action' => 'logout',
        'method'=> 'get'
    ],
    [
        'url' => 'reg',
        'controller' => 'App\Controller\AuthController',
        'action' => 'regPage',
        'method'=> 'get'
    ],
    [
        'url' => 'reg',
        'controller' => 'App\Controller\AuthController',
        'action' => 'reg',
        'method'=> 'post'
    ],
    [
        'url' => 'articles',
        'controller' => 'App\Controller\ArticleController',
        'action' => 'index',
        'method'=> 'get'
    ],
    [
        'url' => '/article/{id}',
        'controller' => 'App\Controller\ArticleController',
        'action' => 'detail',
        'method'=> 'get'
    ],
    [
        'url' => '/add-article/',
        'controller' => 'App\Controller\ArticleController',
        'action' => 'addForm',
        'method'=> 'get'
    ],
    [
        'url' => '/article/create/',
        'controller' => 'App\Controller\ArticleController',
        'action' => 'create',
        'method'=> 'post'
    ],
    [
        'url' => '/article/edit/{id}',
        'controller' => 'App\Controller\ArticleController',
        'action' => 'editForm',
        'method'=> 'get'
    ],
    [
        'url' => '/article/update',
        'controller' => 'App\Controller\ArticleController',
        'action' => 'update',
        'method'=> 'post'
    ],
    [
        'url' => '/article/delete/{id}',
        'controller' => 'App\Controller\ArticleController',
        'action' => 'delete',
        'method'=> 'get'
    ],
    [
        'url' => '/users',
        'controller' => 'App\Controller\UserController',
        'action' => 'index',
        'method'=> 'get'
    ],
    [
        'url' => '/404',
        'controller' => 'App\Controller\ErrorController',
        'action' => 'notFound',
        'method'=> 'get'
    ],
];
