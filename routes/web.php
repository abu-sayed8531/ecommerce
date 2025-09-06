<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;

Route::get('/brands', [BrandController::class, 'BrandList']);
Route::get('/categories', [CategoryController::class, 'CategoryList']);
Route::get('/products-by-brand/{brand_id}', [ProductController::class, 'ListProductByBrand']);
Route::get('/products-by-category/{category_id}', [ProductController::class, 'ListProductByCategory']);
Route::get('/products-by-remark/{remark}', [ProductController::class, 'ListProductByRemark']);
Route::get('/product-slider', [ProductController::class, 'ListProductSlider']);
Route::get('/product-details/{product_id}', [ProductController::class, 'ProductDetails']);
Route::get('/product-reviews/{product_id}', [ProductController::class, 'ListReviewByProduct']);

// user routes
Route::get('/login/{user_email}', [UserController::class, 'login']);
Route::get('/verify-login/{user_email}/{otp}', [UserController::class, 'VerifyLogin']);
Route::get('/logout', [UserController::class, 'logout'])->middleware(TokenVerificationMiddleware::class);
// profile routes
Route::post('/create-profile', [ProfileController::class, 'CreateProfile'])->middleware(TokenVerificationMiddleware::class);
Route::get('/read-profile', [ProfileController::class, 'ReadProfile'])->middleware(TokenVerificationMiddleware::class);
