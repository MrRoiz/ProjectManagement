<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Utils\Responser;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;

class AuthController extends Controller{

    const TOKEN_TYPE = 'Bearer';

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
            $token = $request->user()->createToken(self::TOKEN_TYPE);
            return Responser::ok('Authenticated',[
                'token'           => $token->plainTextToken,
                'tokenWithPrefix' => self::TOKEN_TYPE.' '.$token->plainTextToken,
            ]);
        }else{
            throw new AuthenticationException('Invalid credentials');
        }
    }

    public function validateToken(Request $request){
        return Responser::ok('Current token is valid');
    }
}
