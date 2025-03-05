<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
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

//Admin Login
// Before login

Route::get('/admin/login',[AdminController::class, 'adminLogin']);

// after login
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard',[DashboardController::class, 'adminDashboard']);
Route::get('/admin/logout',[AdminController::class, 'adminLogout']);

// For Categories phpmyadmin

Route::get('/admin/category/list',[CategoryController::class, 'categoryList']); 

// Class-58 (Laravel-11) 30.00 minutes
Route::get('/admin/category/create',[CategoryController::class, 'categoryCreate']); 
// For data insert/submit Post Method 
Route::post('/admin/category/store',[CategoryController::class,'categoryStore']);
Route::get('/admin/category/delete/{id}',[CategoryController::class, 'categoryDelete']);
// Data Edit need 2 url
Route::get('/admin/category/edit/{id}',[CategoryController::class, 'categoryEdit']);
Route::post('/admin/category/update/{id}',[CategoryController::class, 'categoryUpdate']);
