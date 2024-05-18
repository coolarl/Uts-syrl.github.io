<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;

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

Route::post('login', [UserController::class,'login']);
Route::post('register', [UserController::class,'register']);

Route::prefix('oauth/google')->group(function () {
    Route::get('',[GoogleAuthController::class, 'redirect']);
    Route::get('call-back', [GoogleAuthController::class, 'callbackGoogle']);
});

Route::middleware(['admin.jwt'])->group(function(){
    Route::post('product', [ProductController::class,'store']);
    Route::get('product', [ProductController::class,'Read']);
    Route::put('product/{id}', [ProductController::class,'update']);
    Route::delete('product/{id}', [ProductController::class,'delete']);

    Route::post('category', [CategoryController::class,'store']);
    Route::get('category', [CategoryController::class,'Read']);
    Route::put('category/{id}', [CategoryController::class,'update']);
    Route::delete('category/{id}', [CategoryController::class,'delete']);
});
