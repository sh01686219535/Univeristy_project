<?php


use App\Http\Controllers\Vendor\Auth\RegisteredUserController;
use App\Http\Controllers\Vendor\Auth\LoginController;
use App\Http\Controllers\VendorUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('vendor')->middleware('guest:vendor')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('vendor.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('vendor.login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::prefix('vendor')->middleware('auth:vendor')->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('vendor.dashboard');
    // })->name('vendor.dashboard');

     Route::get('/vendor-dashboard', [VendorUserController::class, 'dashboard'])->name('vendor.dashboard');
    // Route::resource('property', PropertyController::class);
    // //============Order==============//
    // Route::get('order', [OrderController::class, 'orderIndex'])->name('order');
    // Route::post('order-delete/{id}', [OrderController::class, 'orderDelete'])->name('order.delete');
    // //==========Vendor =============//
    // Route::get('/vendor-index', [VendorController::class, 'index'])->name('vendor.index');
    // Route::get('/vendor-approve/{id}', [VendorController::class, 'vendorApprove'])->name('vendor.approve');
    // Route::post('/vendor-delete/{id}', [VendorController::class, 'vendorDelete'])->name('vendor.delete');
    // Route::get('/profile-index', [VendorController::class, 'profileIndex'])->name('profile.index');
    // Route::post('/profile-update', [VendorController::class, 'profileUpdate'])->name('profile.update');
    // //===========Contact==============//
    // Route::get('/contact-index', [ContactController::class, 'index'])->name('contact.index');
    // Route::post('/contact-delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');


    Route::post('vendor/logout', [LoginController::class, 'destroy'])->name('vendor.logout');
});
