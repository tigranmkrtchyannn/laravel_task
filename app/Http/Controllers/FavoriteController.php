<?php

namespace App\Http\Controllers;

use App\DTO\FavoriteDto;
use App\Http\Requests\FavoriteDeleteRequest;
use App\Http\Requests\FavoriteRequest;
use App\Servicis\FavoriteAction\FavoriteAddAction;
use App\Servicis\FavoriteAction\FavoriteDeleteAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function addFavorite(
        FavoriteRequest $favoriteRequest,
        FavoriteAddAction $favoriteAddAction
    ): JsonResponse {

        $dto =  FavoriteDto::fromRequest($favoriteRequest);

        if ($favoriteAddAction->run($dto)){

            return response()->json(['success' => 'Product added to Favorite successfully.']);
        }
        return response()->json(['massage' => "product already added Favorite"]);
    }

    public function deleteFavorite(
        FavoriteDeleteRequest $deleteRequest,
        FavoriteDeleteAction $deleteAction
    ) : JsonResponse {

        $dto = FavoriteDto::fromRequest($deleteRequest);

        if($deleteAction->run($dto->userId, $dto->productId)){
            return response()->json("product delete from favorite");
        };
        return response()->json("delete field");

    }
}
