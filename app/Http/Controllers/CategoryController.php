<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryList()
    {
        try {
            $categories = Category::all();
            return ResponseHelper::success($categories);
        } catch (\Throwable $e) {
            return ResponseHelper::error($e);
        }
    }
}
