<?php

namespace App\Actions\Cart;

use App\Models\Cart;
use Laravel\Sanctum\PersonalAccessToken;

class Get
{
    public function __invoke($userId)
    {
        return Cart::where("usersID",$userId)
        ->get();
    }
}