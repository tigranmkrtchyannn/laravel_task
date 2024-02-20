<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FavoriteRequest extends FormRequest
{
    const PRODUCT_ID = 'product_id';

    public function rules(): array
    {
        return [
            self::PRODUCT_ID => [
                'required',
                'integer'
            ]
        ];
    }

    public function getProductId(): int
    {
        return $this->get(self::PRODUCT_ID);
    }

    public function getUserId(): int
    {
        return $this->user('api')->id;
    }

}
