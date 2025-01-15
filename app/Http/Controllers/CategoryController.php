<?php

namespace App\Http\Controllers;

use Exception;
use App\Models;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CategoryResource;
use App\Models\Suppliers;
use Laravel\Sanctum\PersonalAccessToken;

class CategoryController extends Controller
{
    public function getList()
    {
        try{
            $categories = Category::with('products')->get();
            return response()->json([
                'success'=>true,
                'data'=>new CategoryResource($categories),
                'code'=>200
            ],200);
        }
        catch(Exception $e)
        {
            //return response()->json(['succes'=>false,'data'=>'Произошла ошибка при обработке запроса.'.$e->getMessage(),'code'=>500],500);
            return response()->json([
                'success'=>false,
                'data'=>"произошла ошибка:". $e->getMessage(),
                'code'=>500
            ],500);
        }
    }

    public function createCategory(Request $reguest)
    {
        try{
            //проверка на поставщика isSupplier по email
            if(empty($reguest->category_name)||empty($reguest->description))
                throw new Exception("отсутсвует название или описание категории");

            $token = PersonalAccessToken::findToken($reguest->bearerToken());
            $user = $token->tokenable->toArray();
            $supplierId = Suppliers::where('user_id',$user['id'])->first()->toArray()['id'];
            
            $category = new Category();
            $category->title = $reguest->category_name;
            $category->description = $reguest->description;
            $category->image_path = $reguest->image;
            $category->slug = $reguest->slug;
            $category->supplier_id = $supplierId;
            $category->save();

            return response()->json([
                'success'=>true,
                'data'=>'категория добавлена',
                'code'=>200
            ],200);
        }
        catch(Exception $e)
        {
           // echo '<pre>'.htmlentities(print_r("произошла ошибка:". $e->getMessage(), true)).'</pre>';exit();
           return response()->json([
                'success'=>false,
                'data'=>"произошла ошибка:". $e->getMessage(),
                'code'=>500
            ],500);
        }
    }
    
    public function editById(Request $reguest)
    {
        try{
            $mess = "категория не найдена";
            $category = Category::query()->find($reguest->id);
            if(!empty($category))
            {
                $category->title = $reguest->category_name;
                $category->description = $reguest->description;
                $category->image_path = $reguest->image;
                $category->slug = $reguest->slug;
                $category->save();
                $mess = "категория изменена";
                //$category->supplier_id = $supplierId;
            }
            return response()->json([
                'success'=>true,
                'data'=>$mess,
                'code'=>200
            ],200);
        }
        catch(Exception $e)
        {
            return response()->json([
            'succes'=>false,
            'data'=>"произошла ошибка:". $e->getMessage(),
            'code'=>500
            ],500);
        }
    }

    public function deleteById(Request $request)
    {
        try{
            $mess = "категория не найдена ";
            if(Category::where("id",$request->id)->exists())
            {
                Category::query()->where("id",$request->id)->delete();
                $mess = "категория удалена";   
            }
            return response()->json([
                'success'=>true,
                'data'=>$mess,
                'code'=>200
            ],200);
        }
        catch(Exception $e)
        {
            //echo '<pre>'.htmlentities(print_r("произошла ошибка:". $e->getMessage(), true)).'</pre>';exit();
            return response()->json([
                'success'=>false,
                'data'=>"произошла ошибка:". $e->getMessage(),
                'code'=>500
            ],500);
        }
    }
    
    
}
