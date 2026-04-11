<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SparepartController;
use App\Http\Controllers\Admin\BookingController;


// ================= HOME =================
Route::get('/', function () {
    return view('index');
})->name('home');

// ================= AUTH =================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ================= USER =================
Route::prefix('user')
    ->middleware(['auth', 'role:user'])
    ->name('user.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('user.dashboard.index');
        })->name('dashboard');

        // 🔥 FIX INI
        Route::get('/booking', [BookingController::class, 'index'])
            ->name('booking.index');
    });

// ================= ADMIN =================
Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('users', UserController::class)->only(['index']);
        Route::resource('spareparts', SparepartController::class);

        // ✅ FIXED
        Route::get('/bookings', [BookingController::class, 'index'])
            ->name('bookings');

        Route::get('/bookings/{id}', [BookingController::class, 'show'])
            ->name('bookings.show');

        Route::patch('/bookings/{id}/{status}', [BookingController::class, 'updateStatus'])
            ->name('bookings.updateStatus');

        Route::get('/finances', function () {
            return view('admin.finances.index');
        })->name('finances');
    });