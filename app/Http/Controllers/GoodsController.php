<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Goods;
use App\Models\User;

class GoodsController extends Controller
{
    public function getList()
    {   
        if(auth()->check())
        {
            $goods = Goods::get()->toArray();
            return response()->json(['succes'=>true,'data'=>$goods,'code'=>200]);
        }
        else
            return response()->json(['succes'=>false,'date'=>[],'code'=>401]);
    }

}
