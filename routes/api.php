<?php

use App\Http\Controllers\v1\User\AuthController;
use App\Http\Controllers\v1\User\PostController;
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

Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');


Route::middleware('auth:api')->group(function (){
    Route::post('/auth/refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::apiResource('posts', PostController::class)->only(['store', 'show']);
Route::middleware('auth:api')->group(function (){
    Route::apiResource('posts', PostController::class)->only(['update', 'destroy']);
});
