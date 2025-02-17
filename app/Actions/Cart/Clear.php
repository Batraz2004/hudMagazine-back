<?php
namespace App\Actions\Cart;

use App\Models\Cart;

class Clear
{
    public function __invoke($personId)
    {
        $cart = Cart::where('usersID',$personId)
                ->delete();

        return $cart > 0?"корзина очищена":"корзина очищена";//$cart возвращает количество уадаленных твоаров
    }
}