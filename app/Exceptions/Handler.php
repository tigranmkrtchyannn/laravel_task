<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;


class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {


        });
    }


    public function render($request, Throwable $e)
    {

//        $errorMessage = [$e->getMessage()];
//        $httpStatusCode = 500;
//
//        if ($e instanceof ValidationException) {
//            $errorMessage = $e->errors();
//            $httpStatusCode = $e->getCode();
//        }
//        if ($e instanceof BasketNotFoundException) {
//            $errorMessage = $e->getMessage();
//            $httpStatusCode = $e->getCode();
//        }
//        if ($e instanceof ModelNotFoundException) {
//            $errorMessage = $e->getMessage();
//            $httpStatusCode = $e->getCode();
//        }
//        if ($e instanceof ProductNotFound) {
//            $errorMessage = $e->getMessage();
//            $httpStatusCode = $e->getCode();
//        }
//        if ($e instanceof FavoriteNotFoundException) {
//            $errorMessage = $e->getMessage();
//            $httpStatusCode = $e->getCode();
//        }
//        return response()->json(["error" => $errorMessage], $httpStatusCode);

    }
}

