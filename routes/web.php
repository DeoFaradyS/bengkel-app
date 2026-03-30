<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SparepartController;

Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
})->name('dashboard');

// Tambah ini aja
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::resource('spareparts', SparepartController::class);