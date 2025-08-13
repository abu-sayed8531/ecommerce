<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductSlider;

class ProductSliderSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        foreach ($products as $product) {
            ProductSlider::factory()->create(['product_id' => $product->id]);
        }
    }
}
