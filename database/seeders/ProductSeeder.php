<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Thức ăn cho mèo',
            'price' => 30000,
            'description' => 'Thức ăn cho mèo',
            'image' => '/uploads/product/product-1.png',
            'type' => 'Thực phẩm chức năng'
        ]);
        Product::create([
            'name' => 'Thức ăn cho chó',
            'price' => 5000,
            'description' => 'Thức ăn cho chó',
            'image' => '/uploads/product/product-2.png',
            'type' => 'Thực phẩm chức năng'
        ]);
        Product::create([
            'name' => 'Bổ sung chất cho mèo',
            'price' => 49993,
            'description' => 'Bổ sung chất cho mèo',
            'image' => '/uploads/product/product-3.png',
            'type' => 'Thực phẩm bổ sung'
        ]);
        Product::create([
            'name' => 'Bổ sung chất cho chó',
            'price' => 123423,
            'description' => 'Bổ sung chất cho chó',
            'image' => '/uploads/product/product-4.png',
            'type' => 'Thực phẩm bổ sung'
        ]);
    }
}
