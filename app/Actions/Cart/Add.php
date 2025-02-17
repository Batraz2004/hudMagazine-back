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
        if($good->count >= 0 && !empty($good))//проверим есть ли товар в наличии
        {   
            $cart = Cart::where('goodsID',$good->id)->where('usersID',$userId)->first();//проверим может добавляли ли мы раньше товаров с тем же id
            
            if(empty($cart))
                $cart = new Cart;

            $cart->goodsId = $good->id;
            $cart->name = $good->name;
            $cart->usersId = $userId;
            $cart->quantity += $request->quantity;
            $cart->save();

            $message = 'товар добавлен';
        }
        else 
            $message = 'отсуствует в наличии';
        return $message;
    }
}