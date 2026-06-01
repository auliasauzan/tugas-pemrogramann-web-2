<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkincareFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'name' => fake()->word(),
            'brand' => fake()->company(),
            'type' => fake()->randomElement(['Serum', 'Toner', 'Cleanser']),
            'skin_type' => fake()->randomElement(['Dry', 'Oily', 'Normal']),
            'expired_date' => fake()->date(),
        ];
    }
}