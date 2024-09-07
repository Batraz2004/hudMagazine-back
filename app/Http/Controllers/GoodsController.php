<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;

class GoodsController extends Controller
{
    public function getList()
    {
        $goods = Goods::get()->toArray();
        return $goods;
    }
}
