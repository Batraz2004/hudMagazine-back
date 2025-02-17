<?php

namespace App\Actions\Cart;

use App\Models\Cart;
use Laravel\Sanctum\PersonalAccessToken;

class DeleteById
{
    public function __invoke($userId,$itemId)
    {
        $message = "товар отсутсвует";
        $cartItem = Cart::where('id',$itemId)
                ->where('usersID',$userId)
                ->delete();
        if(($cartItem))
            $message = "товар удален";
        return $message;
    }
}