<?php

namespace App\Repository\Write\User;

class UserWriteRepository implements  UserWriteRepositoryInterface
{
    public  function save(User $user): bool
    {
        $user->save();

        return  true;
    }
}
