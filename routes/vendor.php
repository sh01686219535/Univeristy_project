<?php

use App\Http\Controllers\Vendor\Auth\RegisteredUserController;
use App\Http\Controllers\Vendor\Auth\LoginController;
use App\Http\Controllers\VendorUserController;
use Illuminate\Support\Facades\Route;

// Guest routes (for unauthenticated vendors)
Route::prefix('vendor')->middleware('guest:vendor')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('vendor.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('vendor.login');
    Route::post('login', [LoginController::class, 'store']);
});

// Authenticated vendor routes
Route::prefix('vendor')->middleware('auth:vendor')->group(function () {
    Route::get('/dashboard', [VendorUserController::class, 'dashboard'])->name('vendor.dashboard');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('vendor.logout');
});
