<?php
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Category;

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
//sunctum
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
//Route::get('/test', function () {
    // return 'Hello World';
// });
// Route::middleware('auth:sanctum')->get('/goods/list',[GoodsController::class,'getList']);
//или
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/goods/list',[GoodsController::class,'getList']);
// });

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
});
//для поставщиков
Route::group(['middleware'=>['isSupplier']],function(){
    Route::prefix('supplier')->group(function(){
        Route::post('/category/create-new-category',[CategoryController::class,'createCategory']);
        Route::post('/product/add-products',function(){
            return "func is Work";
        });
    });
});

Route::prefix('goods')->group(function(){
    Route::get('/list',[GoodsController::class,'getList']);
});
Route::prefix('category')->group(function(){
    Route::get('/list',[CategoryController::class,'getlist']);
});
