<?php

namespace App\Servicis\Actions;

use App\DTO\LoginDto;
use App\Repository\Read\User\UserReadRepositoryInterface;
use Illuminate\Support\Facades\Auth;


class LoginAction
{
    public function __construct(
        public UserReadRepositoryInterface $userReadRepository,
    ){}

    public function run(LoginDto $dto)
    {

        $user = $this->userReadRepository->getLogUser($dto->email);

        if ($user){
            Auth::attempt(['email' => $user->email, 'password' => $dto->password]);
            $user_token['token'] = $user->createToken('appToken')->accessToken;

            return response()->json([
                'success' => true,
                'token' => $user_token,
                'user' => $user,
            ], 200);
        } else {

            return response()->json([
                'success' => false,
                'message' => 'Failed to authenticate.',
            ], 401);
        }
    }
}




