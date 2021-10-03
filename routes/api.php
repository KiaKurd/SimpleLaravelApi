<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/produtcs', 'App\Http\Controllers\ProductController@index');
Route::get('/produtcs/{id}','App\Http\Controllers\ProductController@show');
Route::get('/produtcs/search/{name}', 'App\Http\Controllers\ProductController@search');




// Protected routes
Route::Group(['middleware' => ['auth:sanctum']], function() {

    Route::post('/produtcs','App\Http\Controllers\ProductController@store');    
    Route::put('/produtcs/{id}', 'App\Http\Controllers\ProductController@update');
    Route::delete('/produtcs/{id}', 'App\Http\Controllers\ProductController@destroy');
    Route::post('/logout', [AuthController::class, 'logout']);
});





Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});
