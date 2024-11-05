<?php

namespace App\Http\Controllers;
use App\Models;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getList()
    {
        try{
            $categories = Category::with('products')->get();
            return response()->json([
                'succes'=>true,
                'data'=>$categories->toArray(),
                'code'=>200
            ],200);
        }
        catch(Exception $e)
        {
            return response()->json(['succes'=>false,'data'=>'Произошла ошибка при обработке запроса.'.$e->getMessage(),'code'=>500],500);
        }
    }
}
