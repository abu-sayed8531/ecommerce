<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Brand;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'short_des' => $this->faker->sentence(8),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'discount' => $this->faker->boolean(30),
            'discount_price' => $this->faker->optional()->randomFloat(2, 5, 900),
            'image' => 'https://placehold.co/200x200',
            'stock' => $this->faker->boolean(80),
            'star' => $this->faker->randomFloat(1, 1, 5),
            'remark' => $this->faker->randomElement(['popular', 'new', 'top', 'special', 'trending', 'regular']),
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'brand_id' => Brand::inRandomOrder()->first()?->id ?? Brand::factory(),
        ];
    }
}
