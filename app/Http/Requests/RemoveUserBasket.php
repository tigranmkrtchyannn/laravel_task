<?php

namespace App\Http\Requests;

//use Illuminate\Foundation\Http\FormRequest;

class RemoveUserBasket extends BasketRequest
{
//    const USER_ID = 'user_id';

    public function getUSerID(): int
    {
        return $this->user('api')->id;
    }
}
