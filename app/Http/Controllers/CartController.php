<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Exception;

class CartController extends Controller
{
    public function add(Request $request)
    {
        try{
            return response()->json([
                'succes'=>true,
                'data'=> $request->toArray(),
                'code'=>200,
            ],200);
        }
        catch(Exception $e)
        {
            return response()->json([
                'success'=>false,
                'data'=>"произошла ошибка:". $e->getMessage(),
                'code'=>500
            ],500);
        }
    }
}
