<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class FavoriteNotFoundException extends  \Exception
{
    public function __construct()
    {
        parent::__construct("Favorite Item not Found", Response::HTTP_NOT_FOUND);

    }
}

