<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::post('signup',[AuthController::class,'signup']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
