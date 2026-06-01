<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
            'brand' => fake()->company(),
            'type' => fake()->randomElement([
                'Serum',
                'Toner',
                'Moisturizer',
                'Shampoo',
                'Perfume'
            ]),
            'skin_type' => fake()->randomElement([
                'Normal',
                'Dry',
                'Oily',
                'Combination'
            ]),
            'expired_date' => fake()->dateTimeBetween('+1 year', '+3 years'),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}