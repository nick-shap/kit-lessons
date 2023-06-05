<?php

namespace App\Controller;

use App\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::get();

        return $this->render(
            'Articles', ['articles' => $articles]
        );
    }

    public function detail($id)
    {
        $article = Article::where('id', $id)->firstOrFail();

        return $this->render(
            'Article', ['article' => $article]
        );
    }
}