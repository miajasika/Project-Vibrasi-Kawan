<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\LoginController;
Use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Klien\DashboardController;
use App\Http\Controllers\Klien\BookingController;
use App\Http\Controllers\Klien\CariPsikologController;
use App\Http\Controllers\Klien\RiwayatKonselingController;

Route::get('/', function () {
    return view('landing');
});
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('login');

Route::get('/register',[App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register',[App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('/', function () {
    return view('landing');
});


Route::middleware(['auth', 'role:klien'])->group(function () {
    Route::get('/klien/dashboard', [App\Http\Controllers\Klien\DashboardController::class, 'index'])->name('klien.dashboard');
    Route::get('/klien/cari-psikolog', [App\Http\Controllers\Klien\CariPsikologController::class, 'index'])->name('klien.cari-psikolog.index');
    Route::get('/klien/cari-psikolog/{psikolog}', [App\Http\Controllers\Klien\CariPsikologController::class, 'show'])->name('klien.cari-psikolog.show');
    Route::post('/klien/booking', [App\Http\Controllers\Klien\BookingController::class, 'store'])->name('klien.booking.store');
    Route::get('/klien/riwayat-konseling', [App\Http\Controllers\Klien\RiwayatKonselingController::class, 'index'])->name('klien.riwayat-konseling.index');
});
