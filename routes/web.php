<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/login', [LoginController::class, 'showLoginForm'] )->name('login');
Route::Post('/login', [LoginController::class, 'login'] );
Route::get('/register', [RegisterController::class, 'showRegistrationForm'] )->name('register');
Route::Post('/register', [RegisterController::class, 'register'] );
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('/home', [LoginController::class, 'showLoginForm'] )->name('login');


 
// Route::get('/user/{id}', [UserController::class, 'show']);