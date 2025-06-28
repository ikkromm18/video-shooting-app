<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TambahanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('front-end');
// })->name('home');

Route::get('/', [BerandaController::class, 'index'])->name('home');


// Harus Login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
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
    Route::resource('booking', BookingController::class)->except('store');

    Route::get('/show-noted/{id}', [BookingController::class, 'showNoted'])->name('booking.show.noted');

    Route::get('/booking-pending', [BookingController::class, 'pending'])->name('booking.pending');
    Route::get('/booking-batal', [BookingController::class, 'batal'])->name('booking.batal');
    Route::post('/booking-terima/{id}', [BookingController::class, 'terima'])->name('booking.terima');
});

// untuk user
Route::middleware(['role:user'])->group(function () {

    Route::get('/user-dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    // Profile
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('user.profile.edit');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');

    // Riwayat Booking
    Route::get('/riwayat', [UserController::class, 'riwayat'])->name('user.riwayat');

    // Ganti Password (opsional)
    Route::get('/password', [UserController::class, 'showPasswordForm'])->name('user.password');
    Route::post('/password', [UserController::class, 'updatePassword'])->name('user.password.update');

    Route::post('/booking/{id}/upload-dp', [UserController::class, 'uploadDp'])->name('user.booking.dp');
    Route::post('/booking/{id}/upload-lunas', [UserController::class, 'uploadLunas'])->name('user.booking.lunas');
});
