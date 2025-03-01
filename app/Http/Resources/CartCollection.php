<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CartCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = $this->collection;
        $items = $data['cart_items']->resource;
        $cart_total_price = $data['total_cart_price']->resource;
        return ['cart_items'=>$items,
                'total_price'=>$cart_total_price];
    }
}
