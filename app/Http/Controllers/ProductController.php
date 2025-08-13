<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\ProductReview;
use App\Models\ProductSlider;

use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;


class ProductController extends Controller
{
    public function ListProductByBrand(Request $request)
    {
        try {
            $products = Product::where('brand_id', $request->brand_id)
                ->with('brand', 'category')
                ->get();
            return ResponseHelper::success($products);
        } catch (\Throwable $e) {
            return ResponseHelper::error($e);
        }
    }

    public function ListProductByCategory(Request $request)
    {
        try {
            $products = Product::where('category_id', $request->category_id)
                ->with('brand', 'category')
                ->get();
            return ResponseHelper::success($products);
        } catch (\Throwable $e) {
            return ResponseHelper::error($e);
        }
    }
    public function ListProductByRemark(Request $request): JsonResponse
    {
        try {
            $products = Product::where('remark', $request->remark)
                ->with('brand', 'category')
                ->get();
            return ResponseHelper::success($products);
        } catch (\Throwable $e) {
            return ResponseHelper::error($e);
        }
    }
    public function ListProductSlider(): JsonResponse
    {
        try {
            $sliders = ProductSlider::all();
            return ResponseHelper::success($sliders);
        } catch (\Throwable $e) {
            return ResponseHelper::error($e);
        }
    }
    public function ProductDetails(Request $request): JsonResponse
    {
        try {

            $details = ProductDetail::where('product_id', $request->product_id)
                ->with('product', 'product.brand', 'product.category')
                ->get();
            return ResponseHelper::success($details);
        } catch (\Throwable $e) {
            return ResponseHelper::error($e);
        }
    }
    public function ListReviewByProduct(Request $request): JsonResponse
    {
        try {
            $reviews = ProductReview::where('product_id', $request->product_id)
                ->with(['customer' => function ($query) {
                    $query->select('id', 'cus_name');
                }])->get();
            return ResponseHelper::success($reviews);
        } catch (\Throwable $e) {
            return ResponseHelper::error($e);
        }
    }
}
