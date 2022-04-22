<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductClone;

class ProductCloneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductClone::create([
            'name' => 'Thức ăn cho mèo',
            'price' => 30000,
            'description' => 'Thức ăn cho mèo',
            'image' => '/uploads/ProductClone/ProductClone-1.png',
            'type' => 'Thực phẩm chức năng'
        ]);
        ProductClone::create([
            'name' => 'Thức ăn cho chó',
            'price' => 5000,
            'description' => 'Thức ăn cho chó',
            'image' => '/uploads/ProductClone/ProductClone-2.png',
            'type' => 'Thực phẩm chức năng'
        ]);
        ProductClone::create([
            'name' => 'Bổ sung chất cho mèo',
            'price' => 49993,
            'description' => 'Bổ sung chất cho mèo',
            'image' => '/uploads/ProductClone/ProductClone-3.png',
            'type' => 'Thực phẩm bổ sung'
        ]);
        ProductClone::create([
            'name' => 'Bổ sung chất cho chó',
            'price' => 123423,
            'description' => 'Bổ sung chất cho chó',
            'image' => '/uploads/ProductClone/ProductClone-4.png',
            'type' => 'Thực phẩm bổ sung'
        ]);
    }
}
