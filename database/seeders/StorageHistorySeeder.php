<?php

namespace Database\Seeders;

use App\Models\StorageHistory;
use Illuminate\Database\Seeder;

class StorageHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StorageHistory::create(['id' => 1, 'product_id' => 4, 'last_quantity' => 0, 'add_quantity' => 123, 'invoice' => '/uploads/storage/aaa.pdf_1650619175', 'note' => 'a', 'employee' =>  'Admin', 'created_at' => '2022-04-22 09:19:35', 'updated_at' => '2022-04-22 09:19:35', 'status' => 3, 'employee_id' => 1, 'type' => 'import']);
        StorageHistory::create(['id' => 2, 'product_id' => 4, 'last_quantity' => 0, 'add_quantity' => 123, 'invoice' => '/uploads/storage/aaa.pdf_1650619175', 'note' => 'a', 'employee' =>  'Admin', 'created_at' => '2022-04-22 09:19:35', 'updated_at' => '2022-04-22 09:19:35', 'status' => 3, 'employee_id' => 1, 'type' => 'import']);
        StorageHistory::create(['id' => 3, 'product_id' => 4, 'last_quantity' => 10, 'add_quantity' => 123, 'invoice' => '/uploads/storage/Khám bệnh _ Diamond Pet.pdf_1650639697', 'note' => 'nhập từ bên B', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 15:01:37', 'updated_at' => '2022-04-22 15:01:37', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 4, 'product_id' => 3, 'last_quantity' => 10, 'add_quantity' => 123, 'invoice' => '/uploads/storage/Khám bệnh _ Diamond Pet.pdf_1650639697', 'note' => 'nhập từ bên A', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 15:01:37', 'updated_at' => '2022-04-22 15:01:37', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 5, 'product_id' => 4, 'last_quantity' => 10, 'add_quantity' => 123, 'invoice' => '/uploads/storage/Khám bệnh _ Diamond Pet.pdf_1650639713', 'note' => 'nhập từ bên B', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 15:01:53', 'updated_at' => '2022-04-22 15:01:53', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 6, 'product_id' => 4, 'last_quantity' => 10, 'add_quantity' => 1, 'invoice' => '/uploads/storage/Khám bệnh _ Diamond Pet_Time.pdf_1650639740', 'note' => 'bên Kho A', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 15:02:20', 'updated_at' => '2022-04-22 15:04:44', 'status' => 1, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 7, 'product_id' => 4, 'last_quantity' => 11, 'add_quantity' => 1, 'invoice' => '/uploads/storage/Khám bệnh _ Diamond Pet.pdf_1650646818', 'note' => 'l', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 17:00:18', 'updated_at' => '2022-04-22 17:00:18', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 8, 'product_id' => 4, 'last_quantity' => 11, 'add_quantity' => 123, 'invoice' => '/uploads/storage/CapstoneProject_Final.pptx_1650646935', 'note' => 'a', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 17:02:15', 'updated_at' => '2022-04-22 17:02:15', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 9, 'product_id' => 4, 'last_quantity' => 11, 'add_quantity' => 1, 'invoice' => '/uploads/storage/Khám bệnh _ Diamond Pet.pdf_1650646967', 'note' => 'lol', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 17:02:47', 'updated_at' => '2022-04-22 17:02:47', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 10, 'product_id' => 4, 'last_quantity' => 11, 'add_quantity' => 1, 'invoice' => '/uploads/storage/Khám bệnh _ Diamond Pet.pdf_1650647218', 'note' => 'lol', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 17:06:58', 'updated_at' => '2022-04-22 17:06:58', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 11, 'product_id' => 4, 'last_quantity' => 11, 'add_quantity' => 1, 'invoice' => '/uploads/storage/Khám bệnh _ Diamond Pet.pdf_1650647223', 'note' => 'lol', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 17:07:03', 'updated_at' => '2022-04-22 17:07:03', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 12, 'product_id' => 4, 'last_quantity' => 11, 'add_quantity' => 1, 'invoice' => '/uploads/storage/Khám bệnh _ Diamond Pet.pdf_1650647223', 'note' => 'lol', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 17:07:03', 'updated_at' => '2022-04-22 17:07:03', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 13, 'product_id' => 4, 'last_quantity' => 11, 'add_quantity' => 123, 'invoice' => '/uploads/storage/Vu-Viet-Phuong-TopCV.vn-050422.161052.pdf_1650647261', 'note' => 'lol', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 17:07:41', 'updated_at' => '2022-04-22 17:07:41', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 14, 'product_id' => 4, 'last_quantity' => 11, 'add_quantity' => 123, 'invoice' => '/uploads/storage/Vu-Viet-Phuong-TopCV.vn-050422.161052.pdf_1650647261', 'note' => 'lol', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 17:07:41', 'updated_at' => '2022-04-22 17:07:41', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 15, 'product_id' => 4, 'last_quantity' => 11, 'add_quantity' => 123, 'invoice' => '/uploads/storage/Vu-Viet-Phuong-TopCV.vn-050422.161052.pdf_1650647261', 'note' => 'lol', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 17:07:41', 'updated_at' => '2022-04-22 17:07:41', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 16, 'product_id' => 4, 'last_quantity' => 11, 'add_quantity' => 123, 'invoice' => '/uploads/storage/Bug.txt_1650647285', 'note' => 'aaa', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 17:08:05', 'updated_at' => '2022-04-22 17:08:05', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 17, 'product_id' => 4, 'last_quantity' => 11, 'add_quantity' => 123, 'invoice' => '/uploads/storage/Bug.txt_1650647285', 'note' => 'aaa', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 17:08:05', 'updated_at' => '2022-05-02 12:44:26', 'status' => 1, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 18, 'product_id' => 4, 'last_quantity' => 11, 'add_quantity' => 123, 'invoice' => '/uploads/storage/Khám bệnh _ Diamond Pet_Time.pdf_1650647644', 'note' => 'a', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 17:14:04', 'updated_at' => '2022-04-25 15:36:36', 'status' => 1, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 19, 'product_id' => 4, 'last_quantity' => 11, 'add_quantity' => 1, 'invoice' => '/uploads/storage/CapstoneProject_Final.pptx_1650647665', 'note' => 'a', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-22 17:14:25', 'updated_at' => '2022-04-24 08:50:28', 'status' => 1, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 20, 'product_id' => 4, 'last_quantity' => 134, 'add_quantity' => 1, 'invoice' => '/uploads/storage/Report4_Software Design Documents.pdf_1650944885', 'note' => 'a', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-26 03:48:05', 'updated_at' => '2022-04-26 04:04:08', 'status' => 1, 'employee_id' => 5, 'type' => 'export']);
        StorageHistory::create(['id' => 21, 'product_id' => 4, 'last_quantity' => 133, 'add_quantity' => 123, 'invoice' => '/uploads/storage/Report4_Software Design Documents.pdf_1650944897', 'note' => 'a', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-26 03:48:17', 'updated_at' => '2022-04-26 03:49:14', 'status' => 1, 'employee_id' => 5, 'type' => 'export']);
        StorageHistory::create(['id' => 22, 'product_id' => 4, 'last_quantity' => 133, 'add_quantity' => 110, 'invoice' => '/uploads/storage/Report4_Software Design Documents.pdf_1650944984', 'note' => 'a', 'employee' => 'Admin', 'created_at' => '2022-04-26 03:49:44', 'updated_at' => '2022-04-26 03:49:44', 'status' => 1, 'employee_id' => 1, 'type' => 'export']);
        StorageHistory::create(['id' => 23, 'product_id' => 1, 'last_quantity' => 6, 'add_quantity' => 2, 'invoice' => '/uploads/storage/What Could Have Been - Sting_ Ray Chen.mp3_1651306959', 'note' => 'a', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-04-30 08:22:39', 'updated_at' => '2022-04-30 08:23:21', 'status' => 1, 'employee_id' => 5, 'type' => 'export']);
        StorageHistory::create(['id' => 24, 'product_id' => 13, 'last_quantity' => 0, 'add_quantity' => 123, 'invoice' => '/uploads/storage/vong-co-tri-ve-ran-fleadom-virbac-444x444.jpg_1651496203', 'note' => 'a', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-05-02 12:56:43', 'updated_at' => '2022-05-02 12:56:43', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 25, 'product_id' => 4, 'last_quantity' => 0, 'add_quantity' => 31, 'invoice' => '/uploads/storage/thuoc-nho-gay-frontline-plus-cho-cho-mini-444x444.jpg_1651496203', 'note' => 'a', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-05-02 12:56:43', 'updated_at' => '2022-05-02 12:56:43', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 26, 'product_id' => 13, 'last_quantity' => 0, 'add_quantity' => 123, 'invoice' => '/uploads/storage/thuoc-giun-heartgard-cho-cho-444x444.jpg_1651568304', 'note' => 'Đặng tiến Thành nhập hàng', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-05-03 08:58:24', 'updated_at' => '2022-05-03 08:58:24', 'status' => 3, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 27, 'product_id' => 13, 'last_quantity' => 0, 'add_quantity' => 123, 'invoice' => '/uploads/storage/thuoc-giun-heartgard-cho-cho-444x444.jpg_1651568304', 'note' => 'Đặng tiến Thành nhập hàng', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-05-03 08:58:24', 'updated_at' => '2022-05-03 12:49:00', 'status' => 1, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 28, 'product_id' => 4, 'last_quantity' => 139, 'add_quantity' => 123, 'invoice' => '/uploads/storage/vong-co-tri-ve-ran-fleadom-virbac-444x444.jpg_1651593230', 'note' => 'thông tin', 'employee' => 'Đặng Tiến Thành', 'created_at' => '2022-05-03 15:53:50', 'updated_at' => '2022-05-03 15:58:04', 'status' => 1, 'employee_id' => 5, 'type' => 'import']);
        StorageHistory::create(['id' => 29, 'product_id' => 13, 'last_quantity' => 113, 'add_quantity' => 106, 'invoice' => '/uploads/storage/thuoc-nho-gay-frontline-plus-cho-cho-mini-444x444.jpg_1651593442', 'note' => 'sản phẩm hỏng', 'employee' =>  'Admin', 'created_at' => '2022-05-03 15:57:22', 'updated_at' => '2022-05-03 15:57:22', 'status' => 1, 'employee_id' => 1, 'type' => 'export']);
    }
}