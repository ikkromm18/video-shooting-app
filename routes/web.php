<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TambahanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front-end');
})->name('home');


// Harus Login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Untuk Guest
Route::middleware('guest')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'submit_register'])->name('submit-register');
    Route::post('/login', [AuthController::class, 'submit_login'])->name('submit-login');
});

// Untuk Admin
Route::middleware(['role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('user', UserController::class);
    Route::resource('layanan', LayananController::class)->except('show');
    Route::resource('tambahan', TambahanController::class)->except('show');
    Route::resource('booking', BookingController::class);
});

// untuk user
Route::middleware(['role:user'])->group(function () {
    Route::get('/user-dashboard', function () {
        return view('user.user-dashboard');
    })->name('user.dashboard');
});
