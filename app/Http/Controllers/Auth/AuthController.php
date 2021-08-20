<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Utils\Responser;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    public function signup(SignupRequest $request){
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        return Responser::created('User created');
    }

    public function login(LoginRequest $request){
        if(Auth::attempt($request->validated())){
            dd(Auth::user());
        }
    }
}
