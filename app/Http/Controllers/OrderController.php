<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\OrderItems;
use App\Helpers\CheckUserHelper;
use App\Actions\Order\Complete as OrderCompleteAction;
use App\Actions\Order\Get as OrderGetAction;

class OrderController extends Controller
{
    public function complete(Request $request)
    {
        try
        {    
            $userId = CheckUserHelper::userByToken($request->bearerToken());
            //создание заказа
            $complete = new OrderCompleteAction();

            return response()->json([
                'succes'=>true,
                'data'=> $complete($request,$userId),
                'code'=>200,
            ],200);
        }
        catch(Exception $e)
        {
            return response()->json([
                'succes'=>false,
                'data'=> "произошла ошибка:".$e->getMessage(),
                'code'=>500,
            ],500);
        }
    }

    public function getList(Request $request)
    {
        try
        {    
            $userId = CheckUserHelper::userByToken($request->bearerToken());
            $order = new OrderGetAction;
            return response()->json([
                'succes'=>true,
                'data' => $order($request,$userId),
                'code'=>200,
            ],200);
        }
        catch(Exception $e)
        {
            return response()->json([
                'succes'=>false,
                'data'=> "произошла ошибка:".$e->getMessage(),
                'code'=>500,
            ],500);
        }
    }
}
