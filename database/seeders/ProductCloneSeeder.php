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
        ProductClone::create(['id' => 1, 'name' => 'Thức ăn cho mèo', 'description' => 'Thức ăn cho mèo', 'price' => 30000, 'image' => '/uploads/product/product-1.png', 'created_at' => '2022-04-22 08:29:42', 'updated_at' => '2022-04-22 08:29:42', 'type' => 'Thực phẩm chức năng']);
        ProductClone::create(['id' => 2, 'name' => 'Thức ăn cho chó', 'description' => 'Thức ăn cho chó', 'price' => 5000, 'image' => '/uploads/product/product-2.png', 'created_at' => '2022-04-22 08:29:42', 'updated_at' => '2022-04-22 08:29:42', 'type' => 'Thực phẩm chức năng']);
        ProductClone::create(['id' => 3, 'name' => 'Bổ sung chất cho mèo', 'description' => 'Bổ sung chất cho mèo', 'price' => 49993, 'image' => '/uploads/product/product-3.png', 'created_at' => '2022-04-22 08:29:42', 'updated_at' => '2022-04-22 08:29:42', 'type' => 'Thực phẩm bổ sung']);
        ProductClone::create(['id' => 4, 'name' => 'Bổ sung chất cho chó', 'description' => 'Bổ sung chất cho chó', 'price' => 123423, 'image' => '/uploads/product/product-4.png', 'created_at' => '2022-04-22 08:29:42', 'updated_at' => '2022-04-22 08:29:42', 'type' => 'Thực phẩm bổ sung']);
        ProductClone::create(['id' => 13, 'name' =>  'Thuốc TẨY GIUN MERANTEL', 'description' => '-Cách dùng và liều dùng: Dùng cho chó, mèo dưới 5kg, ngày 1 lần, 1 viên trong 1 ~ 2 ngày', 'price' => 15000, 'image' => '/uploads/product/thuoc-giun-merantel-L-444x444.jpg_1651489269', 'created_at' => '2022-05-02 11:01:09', 'updated_at' => '2022-05-02 11:02:40', 'type' => 'Thuốc giun cho chó']);
        ProductClone::create(['id' => 15, 'name' =>  'Thuốc tẩy Giun HeartGard Plus', 'description' =>  'Thuốc tẩy Giun HeartGard Plus\r\n\r\nViên màu Xanh dương cho Chó dưới 11,5kg giá 75k/viên\r\n\r\nViên màu Xanh lá cho Chó từ 11,5kg – 22,5kg giá 89k/viên\r\n\r\nViên màu Nâu cho Chó từ 22,5kg – 45kg giá 99k/viên', 'price' => 75000, 'image' => '/uploads/product/thuoc-giun.jpg_1651652530', 'created_at' => '2022-05-04 08:22:10', 'created_at' => '2022-05-04 08:22:10', 'type' => 'Thuốc giun cho chó']);
        ProductClone::create(['id' => 16, 'name' => 'Thuốc xịt trị ghẻ, ve rận ở Chó mèo Viatox', 'description' => 'Viatox Spray 100ml giúp diệt và phòng bọ chét, ve, chấy, rận, ghẻ, ruồi, kiến, gián, mối, bọ, mạt.. ở chó, mèo\r\n\r\nCách sử dụng:\r\n\r\nLắc đều trước khi phun.\r\n', 'price' => 40000, 'image' => '/uploads/product/thuốc xịt ghẻ 1.jpg_1651652732', 'created_at' => '2022-05-04 08:25:32', 'updated_at' => '2022-05-04 08:25:32', 'type' => 'Thuốc xịt ghẻ']);
        ProductClone::create(['id' => 17, 'name' => 'Gáy Fronil Spot', 'description' => 'Thuốc trị rận cho Chó mèo Fronil Spot giúp phòng và điều trị các loại ve và bọ chét trên Chó mèo. Sản phẩm duy trì hiệu quả đến 4 tuần đối với các loại ve và bọ chét.', 'price' => 75000, 'image' => '/uploads/product/thuoc-nho-gay-tri-ve-ran-fronil-spot-1.jpg_1651653094', 'created_at' => '2022-05-04 08:31:34', 'updated_at' => '2022-05-04 08:31:34', 'type' => 'Thuốc nhỏ trị rận bọ chét ve cho chó']);
        ProductClone::create(['id' => 18, 'name' => 'Thuốc Nhỏ Gáy Revolution', 'description' => 'Trị ve, rận, bọ chét hiệu quả\r\nHiệu quả nhanh, không độc hại, không ảnh hưởng đến sức khỏe\r\nTác dụng khử mùi và chống vi khuẩn hiệu quả\r\nLưu giữ hương thơm tươi mát, dễ chịu', 'price' => 90000, 'image' => '/uploads/product/thuoc-nho-gay-revolution.jpg_1651653216', 'created_at' => '2022-05-04 08:33:36', 'updated_at' => '2022-05-04 08:36:30', 'type' => 'Thuốc nhỏ trị rận bọ chét ve cho chó']);
        ProductClone::create(['id' => 19, 'name' => 'Fay Power', 'description' => 'Fay Power chai 100ml là sản phẩm rất được tin dùng khi điều trị ve rận bọ chét ở chó mèo:', 'price' => 90000, 'image' => '/uploads/product/thuoc-xit-fay-power-tri-ve-ran Product::create([1).jpg_1651653569', 'created_at' => '2022-05-04 08:39:29', 'updated_at' => '2022-05-04 08:39:29', 'type' => 'Thuốc nhỏ trị rận bọ chét ve cho chó']);
        ProductClone::create(['id' => 20, 'name' =>  'Thuốc Tẩy Giun Bio-Rantel', 'description' => 'Sản phẩm thuốc tẩy giun cho Chó mèo Bio-Rantel giúp tẩy sạch các loại giun sán ký sinh trong ruột Chó mèo như: Giun đũa, giun móc, giun tóc, sán dây, giun kim..', 'price' => 12000, 'image' => '/uploads/product/thuoc-tay-giun-cho-cho-Exotral-300x300.jpg_1651653782', 'created_at' => '2022-05-04 08:43:02', 'updated_at' => '2022-05-04 08:43:02', 'type' => 'Thuốc tẩy giun']);
    }
}
