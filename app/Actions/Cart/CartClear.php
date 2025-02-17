<?php
namespace App\Actions\Cart;

use App\Models\Cart;

class CartClear
{
    public function __invoke($personId)
    {
        $cart = Cart::where('usersID',$personId)
                ->delete();
        return empty($cart)?"корзина очищена":"не удалось очистить корзину";
    }
}