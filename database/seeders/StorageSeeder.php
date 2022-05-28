<?php

namespace Database\Seeders;

use App\Models\Storage;
use Illuminate\Database\Seeder;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds. 
     * 
     * @return void 
     */
    public function run()
    {
        Storage::create(['id' => 1, 'product_id' => 1,  'quantity' => 3, 'created_at' => '2022-04-22 08:29:42', 'updated_at' => '2022-05-01 10:13:23']);
        Storage::create(['id' => 2, 'product_id' => 2,  'quantity' => 0, 'created_at' => '2022-04-22 08:29:42', 'updated_at' => '2022-05-03 08:29:36']);
        Storage::create(['id' => 3, 'product_id' => 3,  'quantity' => 0, 'created_at' => '2022-04-22 08:29:42', 'updated_at' => '2022-04-30 14:01:22']);
        Storage::create(['id' => 4, 'product_id' => 4,  'quantity' => 262, 'created_at' => '2022-04-22 08:29:42', 'updated_at' => '2022-05-03 15:58:04']);
        Storage::create(['id' => 5, 'product_id' => 5,  'quantity' => 0, 'created_at' => '2022-04-23 11:50:15', 'updated_at' => '2022-04-23 11:50:15']);
        Storage::create(['id' => 9, 'product_id' => 13, 'quantity' => 7, 'created_at' => '2022-05-02 11:01:09', 'updated_at' => '2022-05-03 15:57:22']);
        Storage::create(['id' => 10, 'product_id' => 15, 'quantity' => 0, 'created_at' => '2022-05-04 08:22:10', 'updated_at' => '2022-05-04 08:22:10']);
        Storage::create(['id' => 11, 'product_id' => 17, 'quantity' => 0, 'created_at' => '2022-05-04 08:31:34', 'updated_at' => '2022-05-04 08:31:34']);
        Storage::create(['id' => 12, 'product_id' => 18, 'quantity' => 0, 'created_at' => '2022-05-04 08:33:36', 'updated_at' => '2022-05-04 08:33:36']);
        Storage::create(['id' => 13, 'product_id' => 19, 'quantity' => 0, 'created_at' => '2022-05-04 08:39:29', 'updated_at' => '2022-05-04 08:39:29']);
        Storage::create(['id' => 14, 'product_id' => 20, 'quantity' => 0, 'created_at' => '2022-05-04 08:43:02', 'updated_at' => '2022-05-04 08:43:02']);
    }
}
