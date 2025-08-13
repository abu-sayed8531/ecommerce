<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
            'img1' => 'https://placehold.co/200x200',
            'img2' => 'https://placehold.co/200x200',
            'img3' => 'https://placehold.co/200x200',
            'description' => $this->faker->paragraph(3),
            'color' => $this->faker->safeColorName(),
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'product_id' => Product::inRandomOrder()->first()?->id ?? Product::factory(),
        ];
    }
}
