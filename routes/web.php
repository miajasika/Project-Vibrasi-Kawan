<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\LoginController;
Use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});
//Route Login
Route::get('/login', [LoginController::class, 'login']);

//Route Register
Route::get('/register',[RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register',[RegisterController::class, 'register']);
