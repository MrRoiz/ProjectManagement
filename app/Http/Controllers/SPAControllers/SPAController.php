<?php
namespace App\Http\Controllers\SPAControllers;

use App\Http\Controllers\Controller;

class SPAController extends Controller{
    public function index(){
        return view('app');
    }
}