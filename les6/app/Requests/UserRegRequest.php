<?php
namespace App\Request;

use App\Model\User;
use App\Request;

class UserRegRequest extends Request
{
    public function validate(): object
    {
        $data = $this->get();

        $user = User::where('email', $data->email)->first();

        if ($user) {
            $this->setMessageText('Пользователь с таким email уже существует!');
            $this->setMessageType('error');
        }

        if ($data->password1 !== $data->password2) {
            $this->setMessageText('Пароли не совпадают!');
            $this->setMessageType('error');
        }

        if (!$this->hasError()) {
            $this->setMessageText('Вы успешно зарагестрированы!');
            $this->setMessageType('success');
        }

        return $data;
    }
}
