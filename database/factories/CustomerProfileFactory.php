<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CustomerProfileFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cus_name' => $this->faker->name(),
            'cus_add' => $this->faker->address(),
            'cus_city' => $this->faker->city(),
            'cus_state' => $this->faker->state(),
            'cus_postcode' => $this->faker->postcode(),
            'cus_country' => $this->faker->country(),
            'cus_phone' => $this->faker->phoneNumber(),
            'ship_name' => $this->faker->name(),
            'ship_add' => $this->faker->address(),
            'ship_city' => $this->faker->city(),
            'ship_state' => $this->faker->state(),
            'ship_postcode' => $this->faker->postcode(),
            'ship_country' => $this->faker->country(),
            'ship_phone' => $this->faker->phoneNumber(),
        ];
    }
}
