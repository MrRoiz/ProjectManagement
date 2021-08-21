<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\AuthController;

Route::post('signup',[AuthController::class,'signup']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('company')->group(function(){
        Route::apiResource('/',CompanyController::class);
        Route::get('associate/{id}',[CompanyController::class,'associateCompanyToUser']);
        Route::get('disassociate/{id}',[CompanyController::class,'disassociateCompanyToUser']);
    });

    Route::apiResource('project',ProjectController::class);

    Route::get('validateToken',[AuthController::class,'validateToken']);
});
