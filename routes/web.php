<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyDetailsController;
use App\Http\Controllers\VendorController;


// frontend start
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/frontend-login', [FrontendController::class, 'login'])->name('frontend.login');
Route::get('/frontend-register', [FrontendController::class, 'register'])->name('frontend.register');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/listing', [FrontendController::class, 'listing'])->name('listing');
Route::get('/how-to-work', [FrontendController::class, 'howtoWork'])->name('how.to.work');
// //==============Vendor register ======//
// Route::post('/vendor-register',[FrontendController::class,'vendorRegister'])->name('vendor.register');
// //==============Vendor login ==========//
// Route::post('/vendor-login',[FrontendController::class,'vendorLogin'])->name('vendor.login');
//=============Order ==============//
Route::post('/frontend-order/{id}', [OrderController::class, 'order'])->name('frontend.order');
//========Contact=======================//
Route::post('/contact-store', [ContactController::class, 'contactStore'])->name('contact.store');
//property details
Route::get('/property/details/{id}',[PropertyDetailsController::class,'propertyDetails'])->name('property.details');
//======== Frontend route end=============//

// Backend start
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::resource('property', PropertyController::class);
    //============Order==============//
    Route::get('order', [OrderController::class, 'orderIndex'])->name('order');
    Route::post('order-delete/{id}', [OrderController::class, 'orderDelete'])->name('order.delete');
    //==========Vendor =============//
    Route::get('/vendor-index', [VendorController::class, 'index'])->name('vendor.index');
    Route::get('/vendor-approve/{id}', [VendorController::class, 'vendorApprove'])->name('vendor.approve');
    Route::post('/vendor-delete/{id}', [VendorController::class, 'vendorDelete'])->name('vendor.delete');
    Route::get('/profile-index', [VendorController::class, 'profileIndex'])->name('profile.index');
    Route::post('/profile-update', [VendorController::class, 'profileUpdate'])->name('profile.update');
    //===========Contact==============//
    Route::get('/contact-index', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact-delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/vendor.php';
