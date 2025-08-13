<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\CustomerProfile;

class ProductReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'description' => $this->faker->paragraph(2),
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'customer_id' => CustomerProfile::inRandomOrder()->first()?->id ?? CustomerProfile::factory(),
            'product_id' => Product::inRandomOrder()->first()?->id ?? Product::factory(),
        ];
    }
}
