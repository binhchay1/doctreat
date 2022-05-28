<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create(['id' => 1, 'doctor_id' => 2, 'customer_id' => 3, 'date' => '2022-04-21', 'hours' => '18:00', 'note' => 'lol', 'created_at' => '2022-04-22 10:30:24', 'updated_at' => '2022-04-22 10:31:07', 'status' => 1]);
        Schedule::create(['id' => 2, 'doctor_id' => 2, 'customer_id' => 3, 'date' => '2022-04-22', 'hours' => '19:00', 'note' => 'mệt', 'created_at' => '2022-04-22 10:32:02', 'updated_at' => '2022-04-22 10:32:39', 'status' => 1]);
        Schedule::create(['id' => 3, 'doctor_id' => 2, 'customer_id' => 3, 'date' => '2022-04-22', 'hours' => '18:00', 'note' => 'mệt', 'created_at' => '2022-04-22 10:36:27', 'updated_at' => '2022-04-22 10:36:59', 'status' => 2]);
        Schedule::create(['id' => 4, 'doctor_id' => 2, 'customer_id' => 3, 'date' => '2022-04-22', 'hours' => '18:00', 'note' => 'quá sức', 'created_at' => '2022-04-22 10:40:07', 'updated_at' => '2022-04-22 11:03:03', 'status' => 1]);
        Schedule::create(['id' => 5, 'doctor_id' => 2, 'customer_id' => 3, 'date' => '2022-04-22', 'hours' => '22:00', 'note' => 'a', 'created_at' => '2022-04-22 14:57:57', 'updated_at' => '2022-04-22 14:59:00', 'status' => 1]);
        Schedule::create(['id' => 6, 'doctor_id' => 4, 'customer_id' => 3, 'date' => '2022-04-23', 'hours' => '19:00', 'note' => 'Mệt', 'created_at' => '2022-04-23 11:31:01', 'updated_at' => '2022-04-23 11:32:20', 'status' => 1]);
        Schedule::create(['id' => 7, 'doctor_id' => 2, 'customer_id' => 3, 'date' => '2022-04-24', 'hours' => '11:00', 'note' => 'a', 'created_at' => '2022-04-24 03:28:50', 'updated_at' => '2022-04-24 04:09:43', 'status' => 1]);
        Schedule::create(['id' => 8, 'doctor_id' => 4, 'customer_id' => 3, 'date' => '2022-04-25', 'hours' => '14:00', 'note' => 'aaaa', 'created_at' => '2022-04-24 04:14:35', 'updated_at' => '2022-04-30 11:35:39', 'status' => 1]);
        Schedule::create(['id' => 9, 'doctor_id' => 2, 'customer_id' => 3, 'date' => '2022-04-25', 'hours' => '11:00', 'note' => NULL, 'created_at' => '2022-04-25 03:50:36', 'updated_at' => '2022-04-25 15:39:06', 'status' => 1]);
        Schedule::create(['id' => 10, 'doctor_id' => 2, 'customer_id' => 3, 'date' => '2022-04-26', 'hours' => '09:00', 'note' => 'aaa', 'created_at' => '2022-04-26 01:16:37', 'updated_at' => '2022-04-26 01:17:02', 'status' => 1]);
        Schedule::create(['id' => 11, 'doctor_id' => 2, 'customer_id' => 3, 'date' => '2022-04-26', 'hours' => '11:00', 'note' => 'aaaa', 'created_at' => '2022-04-26 03:35:44', 'updated_at' => '2022-04-26 03:36:32', 'status' => 1]);
        Schedule::create(['id' => 12, 'doctor_id' => 2, 'customer_id' => 3, 'date' => '2022-04-30', 'hours' => '09:00', 'note' => 'a', 'created_at' => '2022-04-30 01:51:19', 'updated_at' => '2022-04-30 01:52:00', 'status' => 1]);
        Schedule::create(['id' => 13, 'doctor_id' => 2, 'customer_id' => 3, 'date' => '2022-04-30', 'hours' => '10:00', 'note' => 'aaa', 'created_at' => '2022-04-30 01:52:32', 'updated_at' => '2022-04-30 01:52:32', 'status' => NULL]);
        Schedule::create(['id' => 14, 'doctor_id' => 4, 'customer_id' => 3, 'date' => '2022-05-02', 'hours' => '20:00', 'note' => NULL, 'created_at' => '2022-05-02 12:02:45', 'updated_at' => '2022-05-02 12:02:45', 'status' => NULL]);
        Schedule::create(['id' => 15, 'doctor_id' => 2, 'customer_id' => 3, 'date' => '2022-05-02', 'hours' => '14:00', 'note' => 'Thú cưng đau bụng', 'created_at' => '2022-05-03 06:31:46', 'updated_at' => '2022-05-03 16:01:34', 'status' => 1]);
        Schedule::create(['id' => 16, 'doctor_id' => 2, 'customer_id' => 3, 'date' => '2022-05-03', 'hours' => '17:00', 'note' => 'a', 'created_at' => '2022-05-03 09:10:18', 'updated_at' => '2022-05-03 09:12:11', 'status' => 1]);
        Schedule::create(['id' => 17, 'doctor_id' => 4, 'customer_id' => 3, 'date' => '2022-05-03', 'hours' => '23:00', 'note' => 'bệnh', 'created_at' => '2022-05-03 15:14:10', 'updated_at' => '2022-05-03 16:49:43', 'status' => 2]);
        Schedule::create(['id' => 18, 'doctor_id' => 2, 'customer_id' => 3, 'date' => '2022-05-04', 'hours' => '15:00', 'note' => 'aa', 'created_at' => '2022-05-04 08:02:10', 'updated_at' => '2022-05-04 11:05:12', 'status' => 1]);
    }
}
