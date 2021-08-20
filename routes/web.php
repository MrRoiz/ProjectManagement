<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SPAControllers\SPAController;

Route::get('/{vueRoutes}', [SPAController::class,'index'])->where('vueRoutes','.*');