<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// For Frontend

// Route::get('/',[FrontendController::class, 'index']);
// Route::get('/shop',[FrontendController::class, 'shop']);
// Route::get('/return-process', [FrontendController::class, 'returnProcess']);
// Route::get('/category-products', [FrontendController::class, 'categoryProducts']);
// Route::get('/subcategory-products', [FrontendController::class, 'subcategoryProducts']);
// Route::get('/view-cart',[FrontendController::class, 'viewCart']);
// Route::get('/checkout',[FrontendController::class, 'checkOut']);

// Policy Pages.......
// Route::get('/privacy-policy',[FrontendController::class, 'privacyPolicy']);
// Route::get('/terms-conditions',[FrontendController::class, 'termsConditions']);
// Route::get('/refund-policy',[FrontendController::class, 'refundPolicy']);
// Route::get('/payment-policy',[FrontendController::class, 'paymentPolicy']);
// Route::get('/about-us',[FrontendController::class, 'aboutUs']);
// Route::get('/contact-us',[FrontendController::class, 'contactUs']);

// Route::get('/product-details',[FrontendController::class, 'productDetails']);

// Route::get('/type-products', [FrontendController::class, 'typeProducts']);


// -----------------For Backend Cl54 to---->>>

Route::get('/',[FrontendController::class, 'index']);
Route::get('/shop',[FrontendController::class, 'shop']);
Route::get('/return-process', [FrontendController::class, 'returnProcess']);
Route::get('/category-products', [FrontendController::class, 'categoryProducts']);
Route::get('/subcategory-products', [FrontendController::class, 'subcategoryProducts']);
Route::get('/view-cart',[FrontendController::class, 'viewCart']);
Route::get('/checkout',[FrontendController::class, 'checkOut']);

// Policy Pages.......
Route::get('/privacy-policy',[FrontendController::class, 'privacyPolicy']);
Route::get('/terms-conditions',[FrontendController::class, 'termsConditions']);
Route::get('/refund-policy',[FrontendController::class, 'refundPolicy']);
Route::get('/payment-policy',[FrontendController::class, 'paymentPolicy']);
Route::get('/about-us',[FrontendController::class, 'aboutUs']);
Route::get('/contact-us',[FrontendController::class, 'contactUs']);

Route::get('/product-details',[FrontendController::class, 'productDetails'])->name('product.details');

Route::get('/type-products', [FrontendController::class, 'typeProducts']);

// ----------------when composer and bootstrap install by command
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
