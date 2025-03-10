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
<<<<<<< HEAD
        if($good->count >= 0 && !empty($good))//проверим есть ли товар в наличии
        {   
            $cart = Cart::where('goodsID',$good->id)->where('usersID',$userId)->first();//проверим может добавляли ли мы раньше товаров с тем же id
            
            if(empty($cart))
                $cart = new Cart;

            $cart->goodsId = $good->id;
            $cart->name = $good->name;
=======
        
        if(!is_null($good) && $good->count > 0)//проверим есть ли товар в наличии
        {   
            //$cart = new Cart;
            $cart = Cart::where('goodsID',$good->id)
                    ->where('usersID',$userId)->first();//проверим может добавляли ли мы раньше товаров с тем же id

            if(empty($cart))
                $cart = new Cart;
           
            $cart->goodsId = $good->id;
            $cart->name = $good->name; 
            $cart->price = $good->price;
            $cart->quantity += $request->quantity;//$request->quantity;//$cart->quantity = $good->quantity;
            $cart->total_price = $cart->price * $cart->quantity;//итоговая цена 
>>>>>>> TAS-22_orders
            $cart->usersId = $userId;
            $cart->quantity += $request->quantity;
            $cart->save();
<<<<<<< HEAD

=======
            $good->save();//а зачем ?
            
>>>>>>> TAS-22_orders
            $message = 'товар добавлен';
        }
        else 
            $message = 'отсуствует в наличии';
        return $message;
    }
}