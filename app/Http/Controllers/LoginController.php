<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

class LoginController extends Controller
{
    public function __construct(){
        // $this->middleware(function($request,$next){
        //     if (Auth::check()) {
        //         return Redirect::route('home');
        //         // return redirect()->route('login');
        //     }
        //     return $next($request);
        // });
    }
    
    function showLoginForm(){

        $this->middleware(function($request,$next){
            if (Auth::check()) {
                return Redirect::route('home');
                // return redirect()->route('login');
            }
            return $next($request);
        });

        return view('auth.login');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials =  $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->route('register')->with('status', 'Login successful.');
        }
        return redirect()->back()->withErrors(['credentials' => 'incorrect credentials'])->withInput();
    }


    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
