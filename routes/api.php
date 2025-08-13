<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/brands', [BrandController::class, 'BrandList']);
Route::get('/categories', [CategoryController::class, 'CategoryList']);
Route::get('/products-by-brand/{brand_id}', [ProductController::class, 'ListProductByBrand']);
Route::get('/products-by-category/{category_id}', [ProductController::class, 'ListProductByCategory']);
Route::get('/products-by-remark/{remark}', [ProductController::class, 'ListProductByRemark']);
Route::get('/product-slider', [ProductController::class, 'ListProductSlider']);
Route::get('/product-details/{product_id}', [ProductController::class, 'ProductDetails']);
Route::get('/product-reviews/{product_id}', [ProductController::class, 'ListReviewByProduct']);
