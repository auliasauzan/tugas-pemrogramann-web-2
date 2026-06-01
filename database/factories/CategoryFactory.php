<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Skincare',
                'Makeup',
                'Body Care',
                'Hair Care',
                'Perfume'
            ]),

            'description' => fake()->sentence(),

            'code' => strtoupper(fake()->lexify('CAT???'))
        ];
    }
}