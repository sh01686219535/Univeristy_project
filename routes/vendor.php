<?php

use App\Http\Controllers\Vendor\AdvertisementController;
use App\Http\Controllers\Vendor\OrderController;
use App\Http\Controllers\Vendor\ProfileController;
use App\Http\Controllers\Vendor\PropertyController;
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;

//vendor route
Route::prefix('vendor')->group(function(){
    Route::get('dashboard',[VendorController::class,'dashboard'])->name('vendor.dashboard');
});
// =============== Vendor Auth Routes =============== //
Route::get('vendor/login', [VendorController::class, 'login'])->name('vendor.login');
Route::post('vendor/login-store', [VendorController::class, 'loginStore'])->name('vendor.login.store');

Route::get('vendor/register', [VendorController::class, 'register'])->name('vendor.register');
Route::post('vendor/register-store', [VendorController::class, 'registerStore'])->name('vendor.register.store');

Route::prefix('vendor')->group(function(){
    // Route::get('login',[VendorController::class,'login'])->name('vendor.login');
    // Route::post('login-store',[VendorController::class,'loginStore'])->name('vendor.login.store');
    // Route::get('register',[VendorController::class,'register'])->name('vendor.register');
    // Route::post('register-store',[VendorController::class,'registerStore'])->name('vendor.register.store');
    Route::get('logout',[VendorController::class,'VendorLogout'])->name('vendor.logout');
     //==============property===============//
    Route::resource('property', PropertyController::class);
    //===============advertisement=========//
    Route::resource('advertisement',AdvertisementController::class);
    //============Order==============//
    Route::get('order', [OrderController::class, 'orderIndex'])->name('order');
    Route::post('order-delete/{id}', [OrderController::class, 'orderDelete'])->name('order.delete');
    Route::get('order-property/{id}', [OrderController::class, 'orderProperty'])->name('order.property');
    Route::get('order-approve/{id}', [OrderController::class, 'orderApprove'])->name('order.approve');
    Route::get('order-cancel/{id}', [OrderController::class, 'orderCancel'])->name('order.cancel');
    Route::get('order-edit/{id}', [OrderController::class, 'orderEdit'])->name('order.edit');
    Route::post('order-update/{id}', [OrderController::class, 'orderUpdate'])->name('order.update');
    //===========Profile==========//
    Route::get('/profile-index', [ProfileController::class, 'profileIndex'])->name('profile.index');
    Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    //==============Vendor Approve============//
    Route::get('vendor-approve/{id}',[VendorController::class,'vendorApprove'])->name('vendor.approve');
    Route::get('vendor-cancel/{id}',[VendorController::class,'vendorCancel'])->name('vendor.cancel');
});