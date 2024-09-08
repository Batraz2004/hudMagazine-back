<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Goods;

class GoodsController extends Controller
{
    public function getList()
    {
        $goods = Goods::get()->toArray();
        return response()->json(['succes'=>true,'data'=>$goods,'code'=>200]);
    }
}
