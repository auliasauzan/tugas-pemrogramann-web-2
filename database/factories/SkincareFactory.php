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
       // Daftar kategori untuk membantu membuat deskripsi buatan
        $kategori = ['Wajah', 'Tubuh', 'Mata', 'Bibir', 'Leher'];

        return [
            // Menggabungkan kata benda dengan kata sifat/warna agar jadi nama produk
            'name' => 'Produk ' . fake()->colorName() . ' ' . fake()->streetName(), 
            
            // Perusahaan Indonesia (PT, CV, dll)
            'brand' => fake()->company(), 
            
            // Jenis produk
            'type' => fake()->randomElement(['Pembersih', 'Penyegar', 'Serum', 'Pelembab', 'Tabir Surya']),
            
            // Jenis kulit
            'skin_type' => fake()->randomElement(['Kering', 'Berminyak', 'Kombinasi', 'Sensitif']),
            
            // Deskripsi dalam Bahasa Indonesia
            'description' => 'Produk ini sangat bagus untuk ' . fake()->randomElement($kategori) . ' dan memberikan hasil yang maksimal.',
            
            // Tanggal kadaluarsa
            'expired_date' => fake()->dateTimeBetween('+1 year', '+3 years'),
        ];
    }
}
