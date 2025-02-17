<?php

namespace App\Actions\Cart;

use App\Models\Cart;
use Laravel\Sanctum\PersonalAccessToken;

class CartDeleteById
{
    public function __invoke($userId,$itemId)
    {
        $message = "товар отсутсвует";
        $cartItem = Cart::where('id',$itemId)
                ->where('usersID',$userId)
                ->delete();
        if(!empty($cartItem))
            $message = "товар удален";
    }
}