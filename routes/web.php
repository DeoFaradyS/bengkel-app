<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Tambah ini aja
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// ===== SPARE PARTS =====
Route::get('/spareparts', function () {
    return view('spareparts.index');
})->name('spareparts.index');
