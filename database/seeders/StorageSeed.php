<?php

namespace Database\Seeders;

use App\Models\Storage;
use Illuminate\Database\Seeder;

class StorageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::create([
            'product_id' => '1',
            'quantity' => 0
        ]);
        Storage::create([
            'product_id' => '2',
            'quantity' => 0
        ]);
        Storage::create([
            'product_id' => '3',
            'quantity' => 0
        ]);
        Storage::create([
            'product_id' => '4',
            'quantity' => 0
        ]);
    }
}
