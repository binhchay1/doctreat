<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create(['id' => 2, 'name' => 'dịch vụ dọn lông cho chó', 'price' => '1200000', 'doctor_id' => 2, 'status' => '1', 'created_at' => '2022-04-22 14:32:45', 'updated_at' => '2022-04-22 14:32:45']);
        Service::create(['id' => 4, 'name' => 'dịch vụ chăm sóc thú cưng', 'price' => '200000', 'doctor_id' => 4, 'status' => '1', 'created_at' => '2022-05-03 09:09:11', 'updated_at' => '2022-05-04 00:27:12']);
        Service::create(['id' => 5, 'name' => 'Dịch vụ mổ đẻ cho thú cưng', 'price' => '15000', 'doctor_id' => 4, 'status' => '1', 'created_at' => '2022-05-03 16:00:31', 'updated_at' => '2022-05-03 16:00:31']);
        Service::create(['id' => 6, 'name' => 'Khám lâm sàng', 'price' => '500000', 'doctor_id' => 4, 'status' => '1', 'created_at' => '2022-05-04 00:12:00', 'updated_at' => '2022-05-04 00:23:16']);
        Service::create(['id' => 7, 'name' => 'Chữa ghẻ chưa viêm da', 'price' => '200000', 'doctor_id' => 4, 'status' => '1', 'created_at' => '2022-05-04 00:20:44', 'updated_at' => '2022-05-04 00:20:44']);
        Service::create(['id' => 8, 'name' => 'Siêu âm cho chó mèo', 'price' => '100000', 'doctor_id' => 2, 'status' => '1', 'created_at' => '2022-05-04 00:23:02', 'updated_at' => '2022-05-04 00:23:02']);
        Service::create(['id' => 9, 'name' => 'Nội soi', 'price' => '900000', 'doctor_id' => 4, 'status' => '1', 'created_at' => '2022-05-04 00:24:00', 'updated_at' => '2022-05-04 00:24:00']);
    }
}
