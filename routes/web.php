<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SparepartController;

Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
})->name('dashboard');

// Tambah ini aja
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::resource('spareparts', SparepartController::class);