<?php
namespace App\Request;

use App\Request;
use App\Service\AuthService;
use JetBrains\PhpStorm\Pure;

class ArticleStoreRequest extends Request
{

    private object $auth;

    public function __construct()
    {
        $this->auth = new AuthService();
    }

    public function validate(): ?object
    {
        $userID = $this->auth->getUserID();
        $data = $this->get();

        if (strlen($data->name) <= 3) {
            $this->setMessageText('больше символов, минимум 4!');
            $this->setMessageType('error');
        }

        if (strlen($data->name) >= 100) {
            $this->setMessageText('Не так много, не больше 100 символов!');
            $this->setMessageType('error');
        }

        if (strlen($data->text) <= 3) {
            $this->setMessageText('Текст больше 3 символов!');
            $this->setMessageType('error');
        }

        if (strlen($data->text) >= 1000) {
            $this->setMessageText('Текмт меньше 1000 символов!');
            $this->setMessageType('error');
        }

        if ($data->user_id && $data->user_id !== $userID) {
            $this->setMessageText('Это чужая статья, вам нельзя ее редактировать!');
            $this->setMessageType('error');
        }

        return $data;
    }
}
