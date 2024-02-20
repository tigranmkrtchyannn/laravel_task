<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class ImagePathRequest extends FormRequest
{
    const FILE='file';
    public function rules(): array
    {
        return [
            self::FILE => [
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048',
            ]
        ];
    }
    public function getFile()
    {
        return  $this->file(self::FILE);
    }
}
