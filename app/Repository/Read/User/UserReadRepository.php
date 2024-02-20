<?php

namespace App\Repository\Read\User;

use App\Models\User;

class UserReadRepository implements UserReadRepositoryInterface
{
    public function getLogUser(string $email): User
    {
        return User::query()->where('email', $email)->first();
    }
}
