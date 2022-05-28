<?php

namespace Database\Seeders;

use App\Models\OrderLine;
use Illuminate\Database\Seeder;

class OrderLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderLine::create(['id' => 1, 'order_id' => '1', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-04-22 13:50:42', 'updated_at' => '2022-04-22 13:50:42']);
        OrderLine::create(['id' => 2, 'order_id' => '2', 'product_id' => '1', 'quantity' => '10', 'created_at' => '2022-04-22 14:53:01', 'updated_at' => '2022-04-22 14:53:01']);
        OrderLine::create(['id' => 3, 'order_id' => '3', 'product_id' => '2', 'quantity' => '7', 'created_at' => '2022-04-22 14:55:09', 'updated_at' => '2022-04-22 14:55:09']);
        OrderLine::create(['id' => 4, 'order_id' => '4', 'product_id' => '3', 'quantity' => '1', 'created_at' => '2022-04-23 04:30:25', 'updated_at' => '2022-04-23 04:30:25']);
        OrderLine::create(['id' => 5, 'order_id' => '5', 'product_id' => '3', 'quantity' => '1', 'created_at' => '2022-04-23 04:30:42', 'updated_at' => '2022-04-23 04:30:42']);
        OrderLine::create(['id' => 6, 'order_id' => '6', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-04-23 04:38:25', 'updated_at' => '2022-04-23 04:38:25']);
        OrderLine::create(['id' => 7, 'order_id' => '7', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-04-23 04:38:39', 'updated_at' => '2022-04-23 04:38:39']);
        OrderLine::create(['id' => 8, 'order_id' => '8', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-04-23 04:38:58', 'updated_at' => '2022-04-23 04:38:58']);
        OrderLine::create(['id' => 9, 'order_id' => '9', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-04-23 04:39:07', 'updated_at' => '2022-04-23 04:39:07']);
        OrderLine::create(['id' => 10, 'order_id' => '10', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-04-23 04:39:17', 'updated_at' => '2022-04-23 04:39:17']);
        OrderLine::create(['id' => 11, 'order_id' => '11', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-04-23 04:39:28', 'updated_at' => '2022-04-23 04:39:28']);
        OrderLine::create(['id' => 12, 'order_id' => '12', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-04-23 04:39:36', 'updated_at' => '2022-04-23 04:39:36']);
        OrderLine::create(['id' => 13, 'order_id' => '13', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-04-23 04:39:54', 'updated_at' => '2022-04-23 04:39:54']);
        OrderLine::create(['id' => 14, 'order_id' => '14', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-04-23 04:40:04', 'updated_at' => '2022-04-23 04:40:04']);
        OrderLine::create(['id' => 15, 'order_id' => '15', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-24 03:11:24', 'updated_at' => '2022-04-24 03:11:24']);
        OrderLine::create(['id' => 16, 'order_id' => '16', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-24 03:11:33', 'updated_at' => '2022-04-24 03:11:33']);
        OrderLine::create(['id' => 17, 'order_id' => '17', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-24 03:11:43', 'updated_at' => '2022-04-24 03:11:43']);
        OrderLine::create(['id' => 18, 'order_id' => '18', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-24 03:12:00', 'updated_at' => '2022-04-24 03:12:00']);
        OrderLine::create(['id' => 19, 'order_id' => '19', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-24 03:12:06', 'updated_at' => '2022-04-24 03:12:06']);
        OrderLine::create(['id' => 20, 'order_id' => '20', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-24 03:13:25', 'updated_at' => '2022-04-24 03:13:25']);
        OrderLine::create(['id' => 21, 'order_id' => '21', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-04-24 04:20:37', 'updated_at' => '2022-04-24 04:20:37']);
        OrderLine::create(['id' => 22, 'order_id' => '22', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-04-24 04:20:45', 'updated_at' => '2022-04-24 04:20:45']);
        OrderLine::create(['id' => 23, 'order_id' => '23', 'product_id' => '2', 'quantity' => '3', 'created_at' => '2022-04-25 15:34:24', 'updated_at' => '2022-04-25 15:34:24']);
        OrderLine::create(['id' => 24, 'order_id' => '24', 'product_id' => '2', 'quantity' => '3', 'created_at' => '2022-04-25 15:34:31', 'updated_at' => '2022-04-25 15:34:31']);
        OrderLine::create(['id' => 25, 'order_id' => '25', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-04-25 15:41:16', 'updated_at' => '2022-04-25 15:41:16']);
        OrderLine::create(['id' => 26, 'order_id' => '26', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-04-28 06:11:04', 'updated_at' => '2022-04-28 06:11:04']);
        OrderLine::create(['id' => 27, 'order_id' => '27', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-04-28 06:12:09', 'updated_at' => '2022-04-28 06:12:09']);
        OrderLine::create(['id' => 28, 'order_id' => '28', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-04-28 06:14:02', 'updated_at' => '2022-04-28 06:14:02']);
        OrderLine::create(['id' => 29, 'order_id' => '29', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-04-28 06:17:46', 'updated_at' => '2022-04-28 06:17:46']);
        OrderLine::create(['id' => 30, 'order_id' => '30', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-04-28 06:17:52', 'updated_at' => '2022-04-28 06:17:52']);
        OrderLine::create(['id' => 31, 'order_id' => '31', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-04-28 06:17:59', 'updated_at' => '2022-04-28 06:17:59']);
        OrderLine::create(['id' => 32, 'order_id' => '32', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-04-28 06:18:03', 'updated_at' => '2022-04-28 06:18:03']);
        OrderLine::create(['id' => 33, 'order_id' => '33', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-04-28 06:18:10', 'updated_at' => '2022-04-28 06:18:10']);
        OrderLine::create(['id' => 34, 'order_id' => '34', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-04-28 06:18:25', 'updated_at' => '2022-04-28 06:18:25']);
        OrderLine::create(['id' => 35, 'order_id' => '35', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-04-28 06:23:22', 'updated_at' => '2022-04-28 06:23:22']);
        OrderLine::create(['id' => 36, 'order_id' => '36', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-28 06:34:47', 'updated_at' => '2022-04-28 06:34:47']);
        OrderLine::create(['id' => 37, 'order_id' => '37', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-28 06:35:01', 'updated_at' => '2022-04-28 06:35:01']);
        OrderLine::create(['id' => 38, 'order_id' => '38', 'product_id' => '3', 'quantity' => '2', 'created_at' => '2022-04-28 06:56:50', 'updated_at' => '2022-04-28 06:56:50']);
        OrderLine::create(['id' => 39, 'order_id' => '40', 'product_id' => '3', 'quantity' => '4', 'created_at' => '2022-04-28 07:02:11', 'updated_at' => '2022-04-28 07:02:11']);
        OrderLine::create(['id' => 40, 'order_id' => '41', 'product_id' => '3', 'quantity' => '1', 'created_at' => '2022-04-28 07:05:24', 'updated_at' => '2022-04-28 07:05:24']);
        OrderLine::create(['id' => 41, 'order_id' => '42', 'product_id' => '3', 'quantity' => '1', 'created_at' => '2022-04-28 07:27:36', 'updated_at' => '2022-04-28 07:27:36']);
        OrderLine::create(['id' => 42, 'order_id' => '43', 'product_id' => '3', 'quantity' => '1', 'created_at' => '2022-04-28 07:27:42', 'updated_at' => '2022-04-28 07:27:42']);
        OrderLine::create(['id' => 43, 'order_id' => '44', 'product_id' => '3', 'quantity' => '1', 'created_at' => '2022-04-28 07:28:30', 'updated_at' => '2022-04-28 07:28:30']);
        OrderLine::create(['id' => 44, 'order_id' => '44', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-28 07:28:31', 'updated_at' => '2022-04-28 07:28:31']);
        OrderLine::create(['id' => 45, 'order_id' => '45', 'product_id' => '3', 'quantity' => '1', 'created_at' => '2022-04-28 11:45:00', 'updated_at' => '2022-04-28 11:45:00']);
        OrderLine::create(['id' => 46, 'order_id' => '46', 'product_id' => '3', 'quantity' => '1', 'created_at' => '2022-04-28 11:45:07', 'updated_at' => '2022-04-28 11:45:07']);
        OrderLine::create(['id' => 47, 'order_id' => '47', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-28 11:47:34', 'updated_at' => '2022-04-28 11:47:34']);
        OrderLine::create(['id' => 48, 'order_id' => '48', 'product_id' => '3', 'quantity' => '1', 'created_at' => '2022-04-28 11:49:12', 'updated_at' => '2022-04-28 11:49:12']);
        OrderLine::create(['id' => 49, 'order_id' => '49', 'product_id' => '3', 'quantity' => '1', 'created_at' => '2022-04-28 11:49:18', 'updated_at' => '2022-04-28 11:49:18']);
        OrderLine::create(['id' => 50, 'order_id' => '50', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-28 11:52:03', 'updated_at' => '2022-04-28 11:52:03']);
        OrderLine::create(['id' => 51, 'order_id' => '51', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-28 11:52:10', 'updated_at' => '2022-04-28 11:52:10']);
        OrderLine::create(['id' => 52, 'order_id' => '52', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-28 11:52:20', 'updated_at' => '2022-04-28 11:52:20']);
        OrderLine::create(['id' => 53, 'order_id' => '53', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-28 12:04:16', 'updated_at' => '2022-04-28 12:04:16']);
        OrderLine::create(['id' => 54, 'order_id' => '54', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-28 12:04:20', 'updated_at' => '2022-04-28 12:04:20']);
        OrderLine::create(['id' => 55, 'order_id' => '55', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-28 12:07:18', 'updated_at' => '2022-04-28 12:07:18']);
        OrderLine::create(['id' => 56, 'order_id' => '56', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-28 12:07:23', 'updated_at' => '2022-04-28 12:07:23']);
        OrderLine::create(['id' => 57, 'order_id' => '58', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-28 12:09:33', 'updated_at' => '2022-04-28 12:09:33']);
        OrderLine::create(['id' => 58, 'order_id' => '59', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-04-28 12:09:38', 'updated_at' => '2022-04-28 12:09:38']);
        OrderLine::create(['id' => 59, 'order_id' => '60', 'product_id' => '3', 'quantity' => '1', 'created_at' => '2022-04-29 14:35:12', 'updated_at' => '2022-04-29 14:35:12']);
        OrderLine::create(['id' => 60, 'order_id' => '61', 'product_id' => '3', 'quantity' => '1', 'created_at' => '2022-04-29 14:39:49', 'updated_at' => '2022-04-29 14:39:49']);
        OrderLine::create(['id' => 61, 'order_id' => '63', 'product_id' => '3', 'quantity' => '1', 'created_at' => '2022-04-30 14:00:43', 'updated_at' => '2022-04-30 14:00:43']);
        OrderLine::create(['id' => 62, 'order_id' => '64', 'product_id' => '1', 'quantity' => '1', 'created_at' => '2022-05-01 10:12:39', 'updated_at' => '2022-05-01 10:12:39']);
        OrderLine::create(['id' => 63, 'order_id' => '64', 'product_id' => '4', 'quantity' => '5', 'created_at' => '2022-05-01 10:12:39', 'updated_at' => '2022-05-01 10:12:39']);
        OrderLine::create(['id' => 64, 'order_id' => '65', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-05-01 10:16:41', 'updated_at' => '2022-05-01 10:16:41']);
        OrderLine::create(['id' => 65, 'order_id' => '66', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-05-01 10:18:58', 'updated_at' => '2022-05-01 10:18:58']);
        OrderLine::create(['id' => 66, 'order_id' => '67', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-05-03 06:35:31', 'updated_at' => '2022-05-03 06:35:31']);
        OrderLine::create(['id' => 67, 'order_id' => '67', 'product_id' => '4', 'quantity' => '6', 'created_at' => '2022-05-03 06:35:31', 'updated_at' => '2022-05-03 06:35:31']);
        OrderLine::create(['id' => 68, 'order_id' => '68', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-05-03 08:24:00', 'updated_at' => '2022-05-03 08:24:00']);
        OrderLine::create(['id' => 69, 'order_id' => '69', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-05-03 08:26:22', 'updated_at' => '2022-05-03 08:26:22']);
        OrderLine::create(['id' => 70, 'order_id' => '70', 'product_id' => '2', 'quantity' => '1', 'created_at' => '2022-05-03 08:28:50', 'updated_at' => '2022-05-03 08:28:50']);
        OrderLine::create(['id' => 71, 'order_id' => '70', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-05-03 08:28:50', 'updated_at' => '2022-05-03 08:28:50']);
        OrderLine::create(['id' => 72, 'order_id' => '71', 'product_id' => '4', 'quantity' => '1', 'created_at' => '2022-05-03 10:51:28', 'updated_at' => '2022-05-03 10:51:28']);
        OrderLine::create(['id' => 73, 'order_id' => '72', 'product_id' => '13', 'quantity' => '5', 'created_at' => '2022-05-03 15:10:30', 'updated_at' => '2022-05-03 15:10:30']);
        OrderLine::create(['id' => 74, 'order_id' => '73', 'product_id' => '13', 'quantity' => '5', 'created_at' => '2022-05-03 15:49:23', 'updated_at' => '2022-05-03 15:49:23']);
        OrderLine::create(['id' => 75, 'order_id' => '74', 'product_id' => '13', 'quantity' => '5', 'created_at' => '2022-05-03 15:49:29', 'updated_at' => '2022-05-03 15:49:29']);
    }
}
