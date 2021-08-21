<?php

use App\Utils\Responser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserStoryController;

Route::post('signup',[AuthController::class,'signup']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('company')->group(function(){
        Route::apiResource('/',CompanyController::class);
        Route::get('associate/{id}',[CompanyController::class,'associateCompanyToUser']);
        Route::get('disassociate/{id}',[CompanyController::class,'disassociateCompanyToUser']);
    });

    Route::apiResource('project',ProjectController::class);
    Route::apiResource('project.userStory',UserStoryController::class);
    Route::apiResource('project.userStory.ticket',TicketController::class);

    Route::get('user',function(){
        return Responser::ok('Logged user',Auth::user()->toArray());
    });

    Route::get('validateToken',[AuthController::class,'validateToken']);
});
