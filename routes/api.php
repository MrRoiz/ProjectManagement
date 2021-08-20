<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::post('signup',[AuthController::class,'signup']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('validateToken',[AuthController::class,'validateToken']);
});
