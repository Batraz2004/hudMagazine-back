<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\Goods;

use App\Helpers\CheckUserHelper;

class OrderController extends Controller
{
    public function complete(Request $request)
    {
        $userId = CheckUserHelper::userByToken($request->bearerToken);

        $cartItems = Cart::where('active',1)
            ->where('usersID',$userId)
            ->get();

        foreach($cartItems as $key => $cartItem)
        {
            $good = Goods::where('id',$cartItem->goodsID)->first();
            if($good->quantity > $cartItem->quantity)
            {
                //отнять quantity у продукта
                $good->quantity -= $cartItem->quantity;
                //создание заказа
                $orderItem = new Order();
                $orderItem->title = $cartItem->name;
                $orderItem->user_id = $userId;//$userId  и $cartItem->name должны совпадать
                $orderItem->goodsID = $cartItem->goodsID;//добавить колонку 
                $orderItem->userGoodsID = $cartItem->userGoodsID;
                $orderItem->quantity = $cartItem->quantity;
                //удаление с корзины 
                $cartItem->delete();
            }
            //$item->delete();
        }
        
        echo '<pre>'.htmlentities(print_r($cartItems->toArray(), true)).'</pre>';exit();
    }
}
