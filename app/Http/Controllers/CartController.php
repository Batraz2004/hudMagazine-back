<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Http\Resources\CartCollection;
use App\Models\Cart;
use App\Models\Goods;
use App\Models\Suppliers;
use Laravel\Sanctum\PersonalAccessToken;
use Exception;

class CartController extends Controller
{
    public function add(CartRequest $request)
    {
        try{
            //пользователь
            $token = PersonalAccessToken::findToken($request->bearerToken());
            $user = $token->tokenable->toArray();
            //продукт

            $good = Goods::query()
                ->where('id',$request->id)
                ->first();

            //$good->count -= $request->quantity; // должно отниматся при оформлении 
            //добавление корзины :
            if($good->count >= 0)//проверим есть ли товар в наличии
            {   
                $cart = new Cart;
                $cart->goodsId = $good->id;
                $cart->name = $good->name;
                $cart->quantity = $request->quantity;//$request->quantity;//$cart->quantity = $good->quantity;
                $cart->usersId = $user['id'];
                $cart->save();
                $good->save();
                $message = 'товар добавлен';
            }
            else 
                $message = 'отсуствует в наличии';

            return response()->json([
                'succes'=>true,
                'data'=> $message,//$cart->toArray(),
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
            $token = PersonalAccessToken::findToken($request->bearerToken());
            $userId = $token->tokenable->id;
            $cartGoods = Cart::where("usersID",$userId)
                ->get();

            return response()->json([
                'succes'=>true,
                'data'=> new CartCollection($cartGoods),
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
