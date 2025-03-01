<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\OrderItems;
use App\Helpers\CheckUserHelper;

class OrderController extends Controller
{
    public function complete(Request $request)
    {
        echo '<pre>'.htmlentities(print_r('стоп!', true)).'</pre>';exit();

        return 1;
        $userId = CheckUserHelper::userByToken($request->bearerToken);
        
        //создание заказа
        $order = new Orders();
        $order->{'e-mail'} = $request->email;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->comment = $request->comment;
        $totalPrice = 0;//итоговая стоймость всех продуктов

        foreach($cartItems as $key => $cartItem)
        {
            $good = Goods::where('id',$cartItem->goodsID)->first();
            if($good->quantity > $cartItem->quantity && $cartItem->active == 1)
            {
                //отнять quantity у продукта
                $cartItem->quantity = $good->quantity > $good->quantity ?
                                  $good->quantity-$cartItem->quantity : $good->quantity;//если нет в наличии указаного кколичество то оформится з
                                  //столько сколько есть в наличии 
                if($cartItem->quantity > 0)
                {
                    $cartItem->price *=  $cartItem->quantity;
                    $totalPrice += $cartItem->cost; 
                    //создание заказа
                    $orderItem = new OrderItems();
                    $orderItem->title = $cartItem->name;
                    $orderItem->user_id = $userId;//$userId  и $cartItem->name должны совпадать
                    $orderItem->goodsID = $cartItem->goodsID;//добавить колонку 
                    $orderItem->ordersId = $cartItem->$order->id;
                    $orderItem->quantity = $cartItem->quantity;
                    //удаление с корзины 
                    $cartItem->delete();
                }
            }
            //$item->delete();
        }
        $order->totalPrice = $totalPrice;
        echo '<pre>'.htmlentities(print_r($cartItems->toArray(), true)).'</pre>';exit();
    }
}
