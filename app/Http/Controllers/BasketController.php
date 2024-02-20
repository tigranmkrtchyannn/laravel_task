<?php

namespace App\Http\Controllers;


use App\DTO\BasketDto;
use App\Http\Requests\BasketRequest;
use App\Http\Requests\ItemsDeleteRequest;
use App\Http\Requests\RemoveUserBasket;
use App\Http\Requests\UpdateItemsQuantity;
use App\Servicis\BasketAction\BasketAddAction;
use App\Servicis\BasketAction\BasketDeleteAction;
use App\Servicis\BasketAction\BasketDeleteForUserAction;
use App\Servicis\BasketAction\BasketUpdateAction;
use Illuminate\Http\JsonResponse;


class BasketController extends Controller
{
    public function __construct(
      public  BasketDeleteAction $basketDeleteAction,
       public  BasketDeleteForUserAction $basketDeleteForUserAction,
    )
    {}

    public function addBasket(
        BasketRequest $basketRequest,
        BasketAddAction $basketAddAction
    ): JsonResponse {
        $basketDto =  BasketDto::fromRequest($basketRequest);

        if($basketAddAction->run($basketDto)){

            return response()->json(['success' => 'Product added to basket successfully.']);
        }
        return  response()->json(['message' =>  'Product already added in basket']);
    }

    public function deleteItems(ItemsDeleteRequest $request): JsonResponse
    {
      if ($this->basketDeleteAction->run($request->getUserId(), $request->getProduct())){

          return response()->json(['success' => 'Basket item deleted successfully.']);

      }else{
          return response()->json("You can not delete that product ");
      }

    }

    public function deleteForUser(RemoveUserBasket $request): JsonResponse
    {


        $this->basketDeleteForUserAction->run($request->getUserId());

        return response()->json(['success' => 'Delete all product for user']);
    }

    public function updateBasketQuantity(
        UpdateItemsQuantity $request,
        BasketUpdateAction $updateAction
    ): JsonResponse  {
        $basketDto = BasketDto::fromRequest($request);

        $updateAction->run($basketDto);

        return response()->json(['success' => 'Basket quantity updated successfully.']);
    }

}
