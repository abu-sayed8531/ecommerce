<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Resources\BrandResource;

class BrandController extends Controller
{
    public function BrandList()
    {
        $brands = Brand::all();
        return ResponseHelper::success(BrandResource::collection($brands));
    }
}
