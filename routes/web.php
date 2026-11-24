<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Auth\LoginController;
Use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Klien\DashboardController as KlienDashboardController;
use App\Http\Controllers\Klien\BookingController;
use App\Http\Controllers\Klien\CariPsikologController;
use App\Http\Controllers\Klien\RiwayatKonselingController;
Use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
Use App\Http\Controllers\Psikolog\DashboardController as PsikologDashboardController;

Route::get('/', function () {
    return view('landing');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.attempt');

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::middleware(['auth', 'role:klien'])->group(function () {
    Route::get('/klien/dashboard', [KlienDashboardController::class, 'index'])->name('klien.dashboard');
    Route::get('/klien/cari-psikolog', [CariPsikologController::class, 'index'])->name('klien.cari-psikolog.index');
    Route::get('/klien/cari-psikolog/{psikolog}', [CariPsikologController::class, 'show'])->name('klien.cari-psikolog.show');
    Route::post('/klien/booking', [BookingController::class, 'store'])->name('klien.booking.store');
    Route::get('/klien/riwayat-konseling', [RiwayatKonselingController::class, 'index'])->name('klien.riwayat-konseling.index');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:psikolog'])->group(function () {
    Route::get('/psikolog/dashboard', [PsikologDashboardController::class, 'index'])->name('psikolog.dashboard');
});
