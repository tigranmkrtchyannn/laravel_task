<?php

namespace App\Http\Controllers;

use App\DTO\LoginDto;
use App\DTO\RegistrationDto;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Servicis\Actions\LoginAction;
use App\Servicis\Actions\RegistrationAction;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(
        public RegistrationAction $action,
        public LoginAction $log_action,
    )
    {}

    public function registration(RegistrationRequest $request): JsonResponse
    {
        $dto =  RegistrationDto::fromRequest($request);

        $user = $this->action->run($dto);

        return response()->json(['user' => $user],201);

    }
    public function loginPost(LoginRequest $request)
    {
        $dto = LoginDto::fromRequest($request);

       return  $log =  $this->log_action->run($dto);

    }

}
