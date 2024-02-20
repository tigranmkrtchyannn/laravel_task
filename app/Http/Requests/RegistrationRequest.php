<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const ROLE ='role';

    public function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string',
                'max:255',
            ],
            self::EMAIL=>[
                'required',
                'string',
                'email',
                'unique:users'
            ],
            self::PASSWORD=>[
                'required',
                'string',
                'min:6',
                'confirmed',
            ],
            self::ROLE => [
                'string'
            ]
        ];

    }


    public function getName(): string
    {
        return $this->get(self::NAME);
    }
    public function  getEmail(): string
    {
        return $this->get(self::EMAIL);
    }
    public function  getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }
    public  function getRole(): string
    {
        return $this->get(self::ROLE);
    }
}
