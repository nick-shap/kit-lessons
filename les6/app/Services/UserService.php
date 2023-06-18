<?php
namespace App\Service;

use App\Model\User;

class UserService
{
    public function userCreate($data)
    {
        return User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => md5($data->password1),
        ]);
    }
}
