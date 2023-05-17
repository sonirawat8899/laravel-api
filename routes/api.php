<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductApiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\API\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('products',[ProductApiController::class,'store']);
Route::get('list',[ProductApiController::class,'list']);
Route::get('list/{id}',[ProductApiController::class,'show']);
Route::put('list/{id}/update',[ProductApiController::class,'update']);
Route::delete('list/{id}/delete',[ProductApiController::class,'delete']);
Route::post('register',[UserController::class,'group']);
