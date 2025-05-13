<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SubCategoryController;
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
// Route::get('/category-products', [FrontendController::class, 'categoryProducts']);
Route::get('/category-products/{id}', [FrontendController::class, 'categoryProducts']);

// Route::get('/subcategory-products', [FrontendController::class, 'subcategoryProducts']);
Route::get('/subcategory-products/{id}', [FrontendController::class, 'subcategoryProducts']);

Route::get('/view-cart',[FrontendController::class, 'viewCart']);
Route::get('/checkout',[FrontendController::class, 'checkOut']);

// search form 
Route::get('/search-products',[FrontendController::class, 'searchProducts']);

// Policy Pages.......
Route::get('/privacy-policy',[FrontendController::class, 'privacyPolicy']);
Route::get('/terms-conditions',[FrontendController::class, 'termsConditions']);
Route::get('/refund-policy',[FrontendController::class, 'refundPolicy']);
Route::get('/payment-policy',[FrontendController::class, 'paymentPolicy']);
Route::get('/about-us',[FrontendController::class, 'aboutUs']);
Route::get('/contact-us',[FrontendController::class, 'contactUs']);

// Route::get('/product-details',[FrontendController::class, 'productDetails'])->name('product.details');
// Route::get('/product-details/{id}',[FrontendController::class, 'productDetails'])->name('product.details');
Route::get('/product-details/{slug}',[FrontendController::class, 'productDetails'])->name('product.details');

// Route::get('/type-products', [FrontendController::class, 'typeProducts']);
Route::get('/type-products/{type}', [FrontendController::class, 'typeProducts']);



// Carts Routes >>>Frontend
Route::get('/add-to-cart/{id}',[FrontendController::class, 'addToCart']);
Route::post('/add-to-cart-details/{id}',[FrontendController::class, 'addToCartDetails']);
Route::get('/cart-delete/{id}',[FrontendController::class, 'addToCartDelete']);


//Order Confirmation
Route::post('/confirm-order',[FrontendController::class, 'confirmOrder']);
// Route::get('/order-confirmed',[FrontendController::class, 'thankyou']);
Route::get('/order-confirmed/{invoiceId}',[FrontendController::class, 'thankyou']);


// Backend

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


// For SubCategories phpmyadmin
Route::get('/admin/sub-category/list',[SubCategoryController::class, 'subCategoryList']); 
Route::get('/admin/sub-category/create',[SubCategoryController::class, 'subCategoryCreate']);
Route::post('/admin/sub-category/store',[SubCategoryController::class,'subCategoryStore']);
// Class 63 
Route::get('/admin/sub-category/edit/{id}',[SubCategoryController::class, 'subCategoryEdit']);
Route::post('/admin/sub-category/update/{id}',[SubCategoryController::class, 'subCategoryUpdate']);
Route::get('/admin/sub-category/delete/{id}',[SubCategoryController::class, 'subcategoryDelete']);

// For Products
Route::get('/admin/product/list',[ProductController::class, 'productList']);
Route::get('/admin/product/create',[ProductController::class, 'productCreate']);
Route::post('/admin/product/store',[ProductController::class, 'productStore']);

Route::get('/admin/product/edit/{id}',[ProductController::class, 'productEdit']);
Route::post('/admin/product/update/{id}',[ProductController::class, 'productUpdate']);
Route::get('/admin/product/delete/{id}',[ProductController::class, 'productDelete']);


// Order Management
Route::get('/admin/all-order/list',[OrderController::class, 'allOrderList']);
Route::get('/admin/edit-order/{id}',[OrderController::class, 'editOrder']);
Route::post('/admin/update-order/{id}',[OrderController::class, 'updateOrder']);

Route::get('/admin/update-order-status/{status}/{id}',[OrderController::class, 'updateOrderStatus']);

Route::get('/admin/status-wise-order/{status}',[OrderController::class, 'statusWiseOrder']);

// Settings
Route::get('/admin/general-setting',[SettingController::class, 'showSettings']);
Route::post('/admin/general-setting/update',[SettingController::class, 'updateSettings']);

// Settings top banners
Route::get('/admin/top-banners',[SettingController::class, 'showBanners']);
Route::get('/admin/top-banner-edit/{id}',[SettingController::class, 'editBanner']);

// for 3 or more banners use id
Route::post('/admin/top-banners/update/{id}',[SettingController::class, 'updateBanners']);