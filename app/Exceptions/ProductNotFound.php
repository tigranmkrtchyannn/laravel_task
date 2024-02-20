<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ProductNotFound extends Exception
{
    public function __construct()
    {
        parent::__construct("my Product not Found", Response::HTTP_NOT_FOUND);

    }
}
