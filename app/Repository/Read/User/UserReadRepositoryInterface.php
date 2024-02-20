<?php

namespace App\Repository\Read\User;

use App\Models\User;

interface UserReadRepositoryInterface
{
    public function getLogUser(string $email): User;
}
