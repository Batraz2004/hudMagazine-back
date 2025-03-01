<?php
namespace App\Actions\Cart;

use App\Models\Cart;
use App\Models\Goods;
use App\Helpers\CheckUserHelper;

class Add
{
    public function __invoke($request,$userId)
    {
        //пользователь
        //продукт добавляемый
        $good = Goods::query()
                ->where('id',$request->id)
                ->first();

        //его доабвление
        
        if($good->count >= 0)//проверим есть ли товар в наличии
        {   
            $cart = new Cart;
            $cart->goodsId = $good->id;
            $cart->name = $good->name;
            $cart->price = $good->price;
            $cart->total_price = $good->price * $request->quantity;
            $cart->quantity = $request->quantity;//$request->quantity;//$cart->quantity = $good->quantity;
            $cart->usersId = $userId;
            $cart->save();
            $good->save();
            $message = 'товар добавлен';
        }
        else 
            $message = 'отсуствует в наличии';
        return $message;
    }
}