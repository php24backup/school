<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware(function($request,$next){
            if (Auth::check()) {
                return Redirect::route('home');
                // return redirect()->route('login');
            }
            return $next($request);
        });
    }
    
    function showRegistrationForm(){
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $messages = [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already taken.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'The password must be at least 8 characters long.',
        ];
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ], $messages);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('login')->with('status', 'Registration successful. You can now login.');
    }
}
