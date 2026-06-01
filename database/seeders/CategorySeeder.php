<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Skincare',
            'description' => 'Perawatan kulit',
            'code' => 'CAT001',
        ]);

        Category::create([
            'name' => 'Makeup',
            'description' => 'Produk makeup',
            'code' => 'CAT002',
        ]);

        Category::create([
            'name' => 'Hair Care',
            'description' => 'Perawatan rambut',
            'code' => 'CAT003',
        ]);

        Category::create([
            'name' => 'Body Care',
            'description' => 'Perawatan tubuh',
            'code' => 'CAT004',
        ]);

        Category::create([
            'name' => 'Perfume',
            'description' => 'Produk parfum',
            'code' => 'CAT005',
        ]);
    }
}