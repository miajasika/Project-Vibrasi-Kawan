<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\LoginController;
Use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Klien\DashboardController;
use App\Http\Controllers\Klien\BookingController;
use App\Http\Controllers\Klien\CariPsikologController;
use App\Http\Controllers\Klien\RiwayatKonselingController;

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


// Route Klien
Route::middleware(['auth', 'role:klien'])->group(function () {
    Route::get('/klien/dashboard', [DashboardController::class, 'index'])->name('klien.dashboard');
    Route::get('/klien/cari-psikolog', [CariPsikologController::class, 'index'])->name('klien.cari-psikolog.index');
    Route::get('/klien/cari-psikolog/{psikolog}', [CariPsikologController::class, 'show'])->name('klien.cari-psikolog.show');
    Route::post('/klien/booking', [BookingController::class, 'store'])->name('klien.booking.store');
    Route::get('/klien/riwayat-konseling', [RiwayatKonselingController::class, 'index'])->name('klien.riwayat-konseling.index');
});
