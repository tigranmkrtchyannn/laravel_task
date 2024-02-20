<?php

namespace App\Repository\Write\User;

interface UserWriteRepositoryInterface
{
    public function save(User $user): bool;
}
