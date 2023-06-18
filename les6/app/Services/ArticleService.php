<?php

namespace App\Service;

use App\Model\Article;
use JetBrains\PhpStorm\Pure;

class ArticleService
{
    private object $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function create($data)
    {
        return Article::create([
            'name' => $data->name,
            'text' => $data->text,
            'user_id' => $this->authService->getUserID(),
        ]);
    }

    public function update($data)
    {
        $article = Article::find($data->id);

        return $article->update([
            'name' => $data->name,
            'text' => $data->text,
        ]);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        return $article->delete();
    }
}
