<?php
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('registration',[UserController,'registration']);
// Route::post('auth',[UserController,'auth']);
Route::post('/auth',[AuthenticatedSessionController::class,'store']);
Route::post('/register',[RegisteredUserController::class,'store']);
Route::post('/logout',[AuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');
Route::get('/test', function () {
    return 'Hello World';
});
Route::get('/goods/list',[GoodsController::class,'getList']);