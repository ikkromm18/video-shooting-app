<?php

use App\Http\Controllers\AuthController;
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
});
