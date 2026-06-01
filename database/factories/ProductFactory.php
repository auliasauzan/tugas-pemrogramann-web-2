<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),

            'name' => fake()->words(2, true),

            'price' => fake()->numberBetween(10000, 500000),

            'stock' => fake()->numberBetween(1, 100),

            'brand' => fake()->company(),

            'expired_date' => fake()->dateTimeBetween('+1 year', '+3 years')
        ];
    }
}