<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
{
     const NAME = 'name';
     const IMAGE = 'image_path';

     const PARENT_ID = 'parent_id';
     const ID = 'id';

    public function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string',
                'max:255',
                'unique:categories',
            ],

            self::IMAGE => [
                'required',
                'string',
                'nullable',
            ],
            self::PARENT_ID => [
                'nullable',
                'exists:categories,id',
            ],
        ];
    }


    public function getImagePath() : ?string
    {
        return $this->get(self::IMAGE);
    }

    public function getCategoryName(): string
    {
     return $this->get(self::NAME);
    }
    public function  getParentId(): ?int
    {
        return  $this->get(self::PARENT_ID);
    }
    public function getId(): ?string
    {
        return $this->route(self::ID);
    }
}
