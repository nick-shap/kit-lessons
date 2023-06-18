<?php

namespace App\Service;

use App\Model\User;

class AuthService
{
    public function getUserID(): ?int
    {
        return $_SESSION['user_id'] ?? null;
    }

    public function userAuth($data)
    {
        $user = User::where('email', $data->email)->first();
        $_SESSION['user_id'] = $user->id;
    }
}
