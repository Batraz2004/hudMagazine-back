<?php

namespace App\Http\Controllers;
use App\Models;
use App\Models\Category;
//use App\Http\Resources\CategoryResource;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getList()
    {
        try{
            $categories = Category::with('products')->get();
            return response()->json([
                'success'=>true,
                'data'=>$categories->toArray(),
                'code'=>200
            ],200);
        }
        catch(Exception $e)
        {
            return response()->json(['succes'=>false,'data'=>'Произошла ошибка при обработке запроса.'.$e->getMessage(),'code'=>500],500);
        }
    }

    public function createCategory(Request $reguest)
    {
        //проверка на поставщика isSupplier
        //beta : 
        echo '<pre>'.htmlentities(print_r("не авторизован", true)).'</pre>';exit();

    }
}
