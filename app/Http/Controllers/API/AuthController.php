<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    function register(Request $request){
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>\Hash::make($request->password),
        ]);

        $token =        $user->createToken("Token")->accessToken;
        return response()->json(['token'=>$token,'user'=>$user],200); 
    }

    function login(Request $request){
        $user = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (auth()->attempt($user)) {
            $token = auth()->user()->createToken('Token')->accessToken;
            return response()->json(['token'=>$token],200); 
        }
        return response()->json(['error'=>'unauthorized'], 401); 
    }
    
    function profile(){
        return response()->json(['user'=>auth()->user()], 401); 
    }
}
