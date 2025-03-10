<?php

namespace App\Actions\Cart;

use App\Models\Cart;
use Laravel\Sanctum\PersonalAccessToken;

class Get
{
    public function __invoke($userId)
    {
        $cartTotalPrice = 0.0;
        $cart = Cart::where("usersID",$userId)
        ->get();
        
        foreach($cart as $item)
            $cartTotalPrice += $item->price*$item->quantity; 
        
        return ['cart_items'=>$cart->toArray(),
                'total_cart_price'=>$cartTotalPrice,
                ];
    }
}