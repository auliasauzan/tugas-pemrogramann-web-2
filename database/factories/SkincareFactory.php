<?php

namespace Database\Factories;

use App\Models\Skincare;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Skincare>
 */
class SkincareFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name' => fake()->words(2, true), // Nama produk acak
        'brand' => fake()->company(), // Nama merek acak
        'type' => fake()->randomElement(['Cleanser', 'Toner', 'Serum', 'Moisturizer', 'Sunscreen']),
        'skin_type' => fake()->randomElement(['Kering', 'Berminyak', 'Kombinasi', 'Sensitif']),
        'expired_date' => fake()->dateTimeBetween('+1 year', '+3 years'),
    ];
    }
}
