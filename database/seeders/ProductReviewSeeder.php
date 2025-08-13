<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductReview;

class ProductReviewSeeder extends Seeder
{
    public function run(): void
    {
        ProductReview::factory()->count(10)->create();
    }
}
