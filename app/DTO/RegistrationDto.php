<?php

namespace App\DTO;


use App\Http\Requests\RegistrationRequest;
use Spatie\DataTransferObject\DataTransferObject;

class RegistrationDto extends DataTransferObject
{
    public string $name;

    public string $email;

    public string $password;
    public ?string $role;


    public static  function fromRequest(RegistrationRequest $request): self
    {
        return new  self (
            name: $request->getName(),
            email: $request->getEmail(),
            password: $request->getPassword(),
            role: $request->getRole()
        );
    }
}
