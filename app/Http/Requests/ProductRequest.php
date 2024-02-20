<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProductRequest extends FormRequest
{
    const NAME = 'name';
    const PRICE = 'price';
    const COUNT = 'count';
    const IMAGE_PATH = 'image_path';
    const CATEGORY_ID = 'category_id';
    const ID = 'id';

    public function rules(): array
    {

        return [
            self::NAME => [
                'required',
                'string',
                'max:255',
            ],
            self::COUNT => [
                'required',
                'integer',
            ],
            self::PRICE => [
                'required',
                'numeric'
            ],
            self::IMAGE_PATH => [
                'string',
                'nullable',
            ],
            self::CATEGORY_ID => [
                'required',
                'integer',
            ]
        ];
    }

    public function getProductName(): string
    {
        return $this->get(self::NAME);
    }
    public function getProductPrice(): float
    {
        return $this->get(self::PRICE);
    }
    public function getCount(): int
    {
        return $this->get(self::COUNT);
    }
    public function getCategoryId(): int
    {
        return $this->get(self::CATEGORY_ID);
    }
    public function getImagePath(): string
    {
        return $this->get(self::IMAGE_PATH);
    }
    public function getId(): ?string
    {
        return $this->route(self::ID);
    }
}
