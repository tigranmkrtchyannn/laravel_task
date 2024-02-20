<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemsDeleteRequest extends FormRequest
{
    const PRODUCT_ID = 'product_id';
    public function rules(): array
    {
        return [
            self::PRODUCT_ID => [
                'integer',
                'required',
            ],
        ];
    }
    public function  getProduct(): int
    {
        return $this->get(self::PRODUCT_ID);
    }

    public function  getUserId(): int
    {
      return $this->user('api')->id;
    }

}
