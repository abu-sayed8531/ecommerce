<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_name' => $this->faker->unique()->word(),
            'category_image' => 'images/categories/category1.png',
        ];
    }
}
