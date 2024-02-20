<?php

namespace App\Servicis\Actions;

use App\DTO\RegistrationDto;
use App\Models\User;

class RegistrationAction
{
  public function  run(RegistrationDto $dto): User
  {
      $user = User::createUsers($dto);

      $user->save();

      return $user;
  }
}
