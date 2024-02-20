<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class BasketRequest extends FormRequest
{
    const PRODUCT_ID = 'product_id';
    const QUANTITY = 'quantity';


    public function rules(): array
    {

        return [
            self::PRODUCT_ID => [
                'integer',

            ],
            self::QUANTITY => [
                'integer',
                'min:1',
            ]
        ];
    }

    public function getProductId(): int
    {
        return $this->get(self::PRODUCT_ID);
    }
    public function getQuantity(): int
    {
        return $this->get(self::QUANTITY);
    }
    public function getUserId(): int
    {
        return $this->user('api')->id;
    }

}
