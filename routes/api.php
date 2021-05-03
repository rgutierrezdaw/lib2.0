<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BookController;
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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/signup', [UserController::class,'signUp']);

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('/logout', [UserController::class,'logout']);
        Route::get('/user', [UserController::class,'user']);
    });
});
Route::group([
    'prefix' => 'book'
], function () {
    //Route::post('/create', [BookController::class, 'create']);
    Route::post('/store', [BookController::class,'store']);

    Route::group([
    ], function() {
        Route::get('/books', [BookController::class,'index']);
        Route::get('/show/{id}', [BookController::class,'show']);
        Route::delete('/destroy/{id}', [BookController::class,'destroy']);
        Route::put('/update/{id}', [BookController::class,'update']);
    });
});
