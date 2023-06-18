<?php
namespace App\Request;

use App\Model\User;
use App\Request;

class UserLoginRequest extends Request
{
    public function validate(): ?object
    {
        $data = $this->get();

        $user = User::where('email', $data->email)->first();

        if (is_null($user)) {
            $this->setMessageText('Пользователь не существует!');
            $this->setMessageType('error');
        }

        if ($user && md5($data->password) !== $user->password) {
            $this->setMessageText('Неверный пароль!');
            $this->setMessageType('error');
        }

        return $data;
    }
}
