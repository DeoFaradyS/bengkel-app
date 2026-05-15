<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\SparepartController;

// Controllers below will be uncommented once created
// use App\Http\Controllers\Admin\FinanceController;
// use App\Http\Controllers\Admin\ProductController;
// use App\Http\Controllers\Admin\ServiceController;
// use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\User\VehicleController;
use App\Http\Controllers\User\ProfileController;


// =====================================================================
// HOME
// =====================================================================
Route::get('/', function () {
    return view('home.index');
})->name('home');


// =====================================================================
// AUTH
// =====================================================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// =====================================================================
// USER
// =====================================================================
Route::prefix('user')
    ->middleware(['auth', 'role:user'])
    ->name('user.')
    ->group(function () {

        Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');

        // Vehicles
        Route::resource('vehicles', VehicleController::class)
            ->only(['index', 'store', 'update', 'destroy']);

        // Profile
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    });


// =====================================================================
// ADMIN
// =====================================================================
Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

        // Users
        Route::resource('users', UserController::class)->only(['index']);

        // Spareparts
        Route::resource('spareparts', SparepartController::class);

        // Bookings
        Route::resource('bookings', BookingController::class)->only(['index', 'show']);
        Route::patch('/bookings/{id}/{status}', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');

        // TODO: buat FinanceController
        Route::get('/finances', fn() => view('coming-soon', ['title' => 'Finance']))->name('finances.index');

        // TODO: buat ProductController
        Route::get('/products', fn() => view('coming-soon', ['title' => 'Product']))->name('products.index');

        // TODO: buat ServiceController
        Route::get('/services', fn() => view('coming-soon', ['title' => 'Service']))->name('services.index');

        // TODO: buat CustomerController
        Route::get('/customers', fn() => view('coming-soon', ['title' => 'Customer']))->name('customers.index');

    });


// =====================================================================
// DEBUG (local only)
// =====================================================================
if (app()->environment('local')) {
    Route::get('/test-500', fn() => abort(500));
    Route::get('/test-404', fn() => abort(404));
}