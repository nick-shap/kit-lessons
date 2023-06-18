<?php
namespace App\Controller;

use App\Controller;

class ErrorController extends Controller
{
    public function notFound(): string
    {
        return $this->view->render('404', [
            'text' => '404 error',
        ]);
    }
}
