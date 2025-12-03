<?php

use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


//user Route

Route::prefix('user')->group(function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    //============Order==============//
    Route::get('order', [OrderController::class, 'orderIndex'])->name('user.order');
    Route::post('order-delete/{id}', [OrderController::class, 'orderDelete'])->name('user.order.delete');
    Route::get('order-property/{id}', [OrderController::class, 'orderProperty'])->name('user.order.property');
    // Route::get('order-approve/{id}', [OrderController::class, 'orderApprove'])->name('user.order.approve');
    // Route::get('order-cancel/{id}', [OrderController::class, 'orderCancel'])->name('user.order.cancel');
    Route::get('order-edit/{id}', [OrderController::class, 'orderEdit'])->name('user.order.edit');
    Route::post('order-update/{id}', [OrderController::class, 'orderUpdate'])->name('user.order.update');
    //===========Profile==========//
    Route::get('/profile-index', [ProfileController::class, 'profileIndex'])->name('user.profile.index');
    Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('user.profile.update');

});

Route::get('login', [UserController::class, 'login'])->name('user.login');
Route::post('login-store', [UserController::class, 'loginStore'])->name('user.login.store');
Route::get('register', [UserController::class, 'register'])->name('user.register');
Route::post('register-store', [UserController::class, 'registerStore'])->name('user.register.store');
Route::get('logout', [UserController::class, 'userLogout'])->name('user.logout');
