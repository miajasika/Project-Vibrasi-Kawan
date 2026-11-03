<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\LoginController;
Use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Klien\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
//Route Login
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

//Route Register
Route::get('/register',[RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register',[RegisterController::class, 'register']);

//Route Landing Page
Route::get('/', function () {
    return view('landing');
});


// Route Dashboard Klien
Route::get('/klien/dashboard', function () {
    return view('klien.dashboard');
});
