<?php

namespace App\DTO;

use App\Http\Requests\LoginRequest;
use Spatie\DataTransferObject\DataTransferObject;

class LoginDto extends DataTransferObject
{
    public string  $email;

    public string  $password;

    public static function  fromRequest(LoginRequest $request): self
    {
        return new self(
            email: $request->getLogEmail(),
            password: $request->getLogPassword()
        );
    }

}
