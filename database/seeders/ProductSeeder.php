<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::truncate();

        $categories = [1, 2, 3, 4, 5];

        for ($i = 1; $i <= 100; $i++) {
            Product::create([
                'name' => 'Product ' . $i,
                'brand' => 'Brand ' . rand(1, 10),
                'type' => ['Skincare', 'Makeup', 'Hair Care', 'Body Care', 'Perfume'][array_rand([0,1,2,3,4])],
                'skin_type' => ['Normal', 'Kering', 'Berminyak', 'Sensitif'][array_rand([0,1,2,3])],
                'expired_date' => now()->addYears(rand(1, 3))->format('Y-m-d'),
                'category_id' => $categories[array_rand($categories)],
            ]);
        }
    }
}