<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Goods;
use App\Models\Suppliers;
use Laravel\Sanctum\PersonalAccessToken;
use Exception;

class CartController extends Controller
{
    public function add(Request $request)
    {
        try{
            //пользователь
            $token = PersonalAccessToken::findToken($request->bearerToken());
            $user = $token->tokenable->toArray();
            //продукт

            $good = Goods::query()
                ->where('id',$request->id)
                ->first();

            //добавление корзины :
            $cart = new Cart;
            $cart->goodsId = $good->id;
            $cart->name = $good->name;
            $cart->usersId = $user['id'];
            //$cart->save();

            return response()->json([
                'succes'=>true,
                'data'=> true,//$cart->toArray(),
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
}
