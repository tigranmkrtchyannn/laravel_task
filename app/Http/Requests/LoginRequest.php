<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    const EMAIL = 'email';
    const PASSWORD = 'password';
    public function rules(): array
    {
        return [
            self::EMAIL => [
                'required',
                'string',
            ],
            self::PASSWORD => [
                'required',
                'string',
                'min:6',
            ]
        ];
    }

    public function getLogEmail(): string
    {
        return $this->get(self::EMAIL);
    }
    public function  getLogPassword(): string

    {
      return $this->get(self::PASSWORD);
    }

}
