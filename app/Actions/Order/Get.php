<?php
namespace App\Actions\Order;
use App\Models\Orders;
use App\Models\OrderItems;

class Get
{
    public function __invoke($request,$userId)
    {
        $orders = Orders::Where('user_id',$userId)->with('items')
            ->get();
 
        return $orders->toArray();
    }
}