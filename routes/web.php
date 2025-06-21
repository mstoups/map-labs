<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'admin'])->group(function () { 
    Route::resource('labs', LabController::class);
});

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\AdminController;

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
});

// Authentication
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Lab Search
Route::middleware(['auth'])->group(function () {
    Route::get('/labs', [LabController::class, 'index'])->name('labs.index');
});
