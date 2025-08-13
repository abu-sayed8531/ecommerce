<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSliderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'short_description' => $this->faker->sentence(8),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'image' => 'https://placehold.co/200x200',
            // 'product_id' will be set in the seeder for uniqueness
        ];
    }
}
