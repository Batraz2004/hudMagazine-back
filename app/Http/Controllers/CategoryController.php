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
        try{
            //проверка на поставщика isSupplier по email
            if(empty($reguest->category_name)||empty($reguest->description))
                throw new Exception("отсутсвует название или описание категории");

            $category = new Category();
            $category->title = $reguest->category_name;
            $category->description = $reguest->description;
            $category->image_path = $reguest->image;
            $category->slug = $reguest->slug;
            $category->save();

            return response()->json([
                'success'=>true,
                'data'=>'категория добавлена',
                'code'=>200
            ],200);
        }
        catch(Exception $e)
        {
            echo '<pre>'.htmlentities(print_r("произошла ошибка:". $e->getMessage(), true)).'</pre>';exit();
        }
    }
}
