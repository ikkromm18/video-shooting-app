<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front-end');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'submit_register'])->name('submit-register');
Route::post('/login', [AuthController::class, 'submit_login'])->name('submit-login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
