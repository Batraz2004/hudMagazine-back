<?php
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models;
use Maatwebsite\Excel\Row;
use PhpOffice\PhpSpreadsheet\Calculation\Category as CalculationCategory;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Breeze базовый набор:
Route::prefix('user')->group(function () {
    Route::post('/auth',[AuthenticatedSessionController::class,'store']);
    Route::post('/register',[RegisteredUserController::class,'store']);
    Route::post('/logout',[AuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');
});

//custom middleware для аутентификации:
Route::group(['middleware'=>['checkAuthTokens']],function(){
    Route::get('/testAuthToken',function(){
        return 'its work';
    });
    Route::prefix('/cart')->group(function(){
        Route::post('/add',[CartController::class,"add"]);
        Route::get('/get',[CartController::class,"get"]);
        Route::post('/cancell-by-id',[CartController::class,"cancelById"]);
        Route::post('/clear',[CartController::class,"clear"]);
    });

});
//для поставщиков
Route::group(['middleware'=>['isSupplier']],function(){
    Route::prefix('supplier')->group(function(){
        Route::post('/category/create-new-category',[CategoryController::class,'createCategory']);
        Route::post('/category/edit-category',[CategoryController::class,'editById']);
        Route::post('/category/delete-category',[CategoryController::class,'deleteById']);
        Route::post('/product/import', [GoodsController::class,'import']);
        Route::get('/product/export', [GoodsController::class,'export']);
        Route::get("/product/export-category-id/{id}",[GoodsController::class,"exportCategoryId"]);
    });
});

Route::prefix('goods')->group(function(){
    Route::get('/list',[GoodsController::class,'getList']);
});
Route::prefix('category')->group(function(){
    Route::get('/list',[CategoryController::class,'getlist']);
});
