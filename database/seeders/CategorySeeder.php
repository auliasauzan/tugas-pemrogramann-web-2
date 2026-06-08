<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::truncate();

        Category::insert([
            [
                'id' => 1,
                'name' => 'Skincare',
                'description' => 'Skincare',
                'code' => 'SKN'
            ],
            [
                'id' => 2,
                'name' => 'Makeup',
                'description' => 'Makeup',
                'code' => 'MKP'
            ],
            [
                'id' => 3,
                'name' => 'Hair Care',
                'description' => 'Hair Care',
                'code' => 'HRC'
            ],
            [
                'id' => 4,
                'name' => 'Body Care',
                'description' => 'Body Care',
                'code' => 'BDC'
            ],
            [
                'id' => 5,
                'name' => 'Perfume',
                'description' => 'Perfume',
                'code' => 'PRF'
            ],
        ]);
    }
}