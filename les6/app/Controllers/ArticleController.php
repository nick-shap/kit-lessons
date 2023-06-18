<?php
namespace App\Controller;

use App\Controller;
use App\Http;
use App\Model\Article;
use App\Request\ArticleStoreRequest;
use App\Service\ArticleService;
use JetBrains\PhpStorm\NoReturn;
use JetBrains\PhpStorm\Pure;

class ArticleController extends Controller
{
    private object $service;
    private object $storeRequest;

    public function __construct()
    {
        parent::__construct();

        $this->service = new ArticleService();
        $this->storeRequest = new ArticleStoreRequest();
    }

    public function index(): bool|string
    {
        return $this->view->render('ArticleList', [
            'articles' => Article::get(),
        ]);
    }

    public function detail($id): bool|string
    {
        return $this->view->render('ArticleDetail', [
            'article' => Article::where('id', $id)->firstOrFail(),
        ]);
    }

    public function addForm(): bool|string
    {
        return $this->view->render('ArticleAdd', []);
    }

    public function editForm($id): string
    {
        return $this->view->render('ArticleUpdate', [
            'article' => Article::where('id', $id)->firstOrFail(),
        ]);
    }

    public function create(): string
    {
        $data = $this->storeRequest->validate();

        if (!$this->storeRequest->hasError()) {
            $this->service->create($data);
            Http::redirect('/articles');
        }

        return $this->view->render('ArticleAdd', [
            'article'=> $data,
            'message' => [
                'text' => $this->storeRequest->getMessageText(),
                'type' => $this->storeRequest->getMessageType(),
            ]
        ]);
    }

    public function update(): string
    {
        $data = $this->storeRequest->validate();

        if (!$this->storeRequest->hasError()) {
            $this->service->update($data);
            Http::redirect('/articles');
        }

        return $this->view->render('ArticleUpdate', [
            'article'=> $data,
            'message' => [
                'text' => $this->storeRequest->getMessageText(),
                'type' => $this->storeRequest->getMessageType(),
            ]
        ]);
    }

    public function delete($id): string
    {
        $this->service->delete($id);

        Http::redirect('/articles');
    }
}
