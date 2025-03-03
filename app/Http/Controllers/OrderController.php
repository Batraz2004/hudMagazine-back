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
        $userId = CheckUserHelper::userByToken($request->bearerToken());

        //создание заказа
        $order = new Orders();
        $order->{'e-mail'} = $request->email;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->comment = $request->comment;
        $order->user_id = $userId;
        $order->save();
        $totalPrice = 0;//итоговая стоймость всех продуктов
        $message = "товары не выбраны";
        //получение активных товаров пользователя
        $cartItems = Cart::where('usersID',$userId)
                    ->where('active',1)
                    ->select(['id','name','goodsID','quantity','price','total_price','active'])
                    ->get();

        foreach($cartItems as $key => $cartItem)
        {
            $good = Goods::where('id',$cartItem->goodsID)->first();
            
            if($good->count > $cartItem->quantity && $cartItem->active == 1)
            {
                //отнять quantity у продукта
                $good->count = $good->count - $cartItem->quantity; 
                
                if($good->count > 0)
                {
                    $totalPrice += $cartItem->cost; 
                    //создание заказа
                    $orderItem = new OrderItems();
                    $orderItem->name = $cartItem->name;
                    $orderItem->user_id = $userId;//$userId  и $cartItem->name должны совпадать
                    $orderItem->goodsID = $cartItem->goodsID;//добавить колонку 
                    $orderItem->orderId = $order->id;
                    $orderItem->quantity = $cartItem->quantity;
                    $orderItem->price = $cartItem->price;
                    $orderItem->total_price = $cartItem->price * $cartItem->quantity;

                    $orderItem->save();
                    $cartItem->delete();//удаление с корзины 
                    $message = "заказ оформлен";
                }
                else
                    return "отсуствует в наличии"; 
            }
        }

        $order->total_price = $totalPrice;
        $order->save();
        return response()->json([
            'succes'=>true,
            'data'=> $message,
            'code'=>200,
        ],200);
    }
}
