<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

//========= Frontend route start===========//
Route::get('/',[FrontendController::class,'home'])->name('home');
Route::get('/frontend-login',[FrontendController::class,'login'])->name('frontend.login');
Route::get('/frontend-register',[FrontendController::class,'register'])->name('frontend.register');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
Route::get('/listing',[FrontendController::class,'listing'])->name('listing');
Route::get('/how-to-work',[FrontendController::class,'howtoWork'])->name('how.to.work');
//==============Vendor register ======//
Route::post('/vendor-register',[FrontendController::class,'vendorRegister'])->name('vendor.register');
//==============Vendor login ==========//
Route::post('/vendor-login',[FrontendController::class,'vendorLogin'])->name('vendor.login');
//=============Order ==============//
Route::post('/frontend-order/{id}', [OrderController::class, 'order'])->name('frontend.order');
//======== Frontend route end=============//

//==========Backend Route start==========//
Route::get('/login',[HomeController::class,'login'])->name('login');
Route::get('/register',[HomeController::class,'register'])->name('register');
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    Route::resource('property', PropertyController::class);
    //============Order==============//
    Route::get('order',[OrderController::class,'orderIndex'])->name('order');
    Route::post('order-delete/{id}',[OrderController::class,'orderDelete'])->name('order.delete');
    //==========Vendor =============//
    Route::get('/vendor-index',[VendorController::class,'index'])->name('vendor.index');
    Route::get('/vendor-approve/{id}',[VendorController::class,'vendorApprove'])->name('vendor.approve');
    Route::post('/vendor-delete/{id}',[VendorController::class,'vendorDelete'])->name('vendor.delete');
    Route::get('/profile-index',[VendorController::class,'profileIndex'])->name('profile.index');
    Route::post('/profile-update',[VendorController::class,'profileUpdate'])->name('profile.update');
});
//==========Backend Route end==========//