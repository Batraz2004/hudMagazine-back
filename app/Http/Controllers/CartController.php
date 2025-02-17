<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartAddRequest;
use App\Http\Resources\CartCollection;
use App\Models\Cart;
use App\Models\Goods;
use App\Models\Suppliers;
use Laravel\Sanctum\PersonalAccessToken;
use App\Helpers\CheckUserHelper;
use App\Actions\Cart\CartGet;
use App\Actions\Cart\CartAdd;
use App\Actions\Cart\CartDeleteById;
use App\Actions\Cart\CartClear;

use Exception;

class CartController extends Controller
{

    public function add(CartAddRequest $request)
    {
        try{ 
            //$good->count -= $request->quantity; // должно отниматся при оформлении 
            //добавление корзины :
            $userId = CheckUserHelper::userByToken($request->bearerToken());
            $cartAdd = new CartAdd();

            return response()->json([
                'succes'=>true,
                'data'=> $cartAdd($request,$userId),
                'code'=>200,
            ],200);
        }
        catch(Exception $e)
        {
            return response()->json([
                'success'=>false,
                'data'=>"произошла ошибка:". $e->getMessage(),
                'code'=>500
            ],500);
        }
    }

    public function get(Request $request)
    {
        try
        {
            $userId = CheckUserHelper::userByToken($request->bearerToken());
            $cartGet = new CartGet();
   
            return response()->json([
                'succes'=>true,
                'data'=> new CartCollection($cartGet($userId)),
                'code'=>200,
            ],200);

        }
        catch(Exception $e)
        {
            return response()->json([
                'success'=>false,
                'data'=>"произошла ошибка:". $e->getMessage(),
                'code'=>500
            ],500);
        }
        
    }

    public function cancelById(Request $request)
    {
        try
        {
            $personId = CheckUserHelper::userByToken($request->bearerToken());
            $deleteItemInf = new CartDeleteById;

            return response()->json([
                'succes'=>true,
                'data'=>$deleteItemInf($personId,$request->id),
                'code'=>200],
            '200');
        }
        catch(Exception $e)
        {
            return response()->json([
                'succes'=>false,
                'произошла ошибка'=>$e->getMessage(),
                'code'=>500],
                500);
        }
    }

    public function clear(Request $request)
    {
        try
        {
            $personId = CheckUserHelper::userByToken($request->bearerToken());
            $cart = new CartClear();

            return response()->json([
                'succes'=>true,
                'data'=>$cart($personId),
                'code'=>200],
            '200');
        }
        catch(Exception $e)
        {
            return response()->json([
                'succes'=>false,
                'произошла ошибка'=>$e->getMessage(),
                'code'=>500],
                500);
        }
    }
}
