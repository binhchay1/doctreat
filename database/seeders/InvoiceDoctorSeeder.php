<?php

namespace Database\Seeders;

use App\Models\InvoiceDoctor;
use Illuminate\Database\Seeder;

class InvoiceDoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvoiceDoctor::create(['id' => 1, 'invoice_code' => '3856507095', 'services' => '2,1', 'total' => '13512312', 'doctor_id' => '2', 'created_at' =>  '2022-04-22 14:59:32', 'updated_at' => '2022-04-22 14:59:32']);
        InvoiceDoctor::create(['id' => 2, 'invoice_code' => '1797506170', 'services' => '3,2', 'total' => '1200123', 'doctor_id' => '2', 'created_at' => '2022-04-24 08:23:00', 'updated_at' => '2022-04-24 08:23:00']);
        InvoiceDoctor::create(['id' => 3, 'invoice_code' => '0949389199', 'services' => '3,2', 'total' => '1200123', 'doctor_id' => '2', 'created_at' => '2022-04-24 15:43:56', 'updated_at' => '2022-04-24 15:43:56']);
        InvoiceDoctor::create(['id' => 4, 'invoice_code' => '4509794596', 'services' => '2,1', 'total' => '1512312', 'doctor_id' => '2', 'created_at' => '2022-04-26 01:19:24', 'updated_at' => '2022-04-26 01:19:24']);
        InvoiceDoctor::create(['id' => 5, 'invoice_code' => '9272835156', 'services' => '2,1', 'total' => '1512312', 'doctor_id' => '2', 'created_at' => '2022-04-26 01:19:29', 'updated_at' => '2022-04-26 01:19:29']);
        InvoiceDoctor::create(['id' => 6, 'invoice_code' => '9524739604', 'services' => '2,1', 'total' => '1512312', 'doctor_id' => '2', 'created_at' => '2022-04-26 01:20:51', 'updated_at' => '2022-04-26 01:20:51']);
        InvoiceDoctor::create(['id' => 7, 'invoice_code' => '3122238402', 'services' => '2,1', 'total' => '1512312', 'doctor_id' => '2', 'created_at' => '2022-04-26 05:08:59', 'updated_at' => '2022-04-26 05:08:59']);
        InvoiceDoctor::create(['id' => 8, 'invoice_code' => '8023421400', 'services' => '2,1', 'total' => '1512312', 'doctor_id' => '2', 'created_at' => '2022-04-26 05:12:41', 'updated_at' => '2022-04-26 05:12:41']);
        InvoiceDoctor::create(['id' => 9, 'invoice_code' => '8322126718', 'services' => '2', 'total' => '1200000', 'doctor_id' => '2', 'created_at' => '2022-04-30 11:36:36', 'updated_at' => '2022-04-30 11:36:36']);
        InvoiceDoctor::create(['id' => 10, 'invoice_code' =>  '4691684209', 'services' =>  '2', 'total' => '1200000', 'doctor_id' => '2', 'created_at' => '2022-04-30 11:36:45', 'updated_at' => '2022-04-30 11:36:45']);
        InvoiceDoctor::create(['id' => 11, 'invoice_code' =>  '3404215926', 'services' =>  '4,2', 'total' => '1215000', 'doctor_id' => '2', 'created_at' => '2022-05-03 09:13:50', 'updated_at' => '2022-05-03 09:13:50']);
        InvoiceDoctor::create(['id' => 12, 'invoice_code' =>  '6955676370', 'services' =>  '5,4,2', 'total' => '1230000', 'doctor_id' => '2', 'created_at' => '2022-05-03 16:02:50', 'updated_at' => '2022-05-03 16:02:50']);
        InvoiceDoctor::create(['id' => 13, 'invoice_code' =>  '3586646159', 'services' =>  '9,8', 'total' => '1000000', 'doctor_id' => '2', 'created_at' => '2022-05-04 11:05:52', 'updated_at' => '2022-05-04 11:05:52']);
        InvoiceDoctor::create(['id' => 14, 'invoice_code' =>  '8008682401', 'services' =>  '9,8', 'total' => '1000000', 'doctor_id' => '2', 'created_at' => '2022-05-04 11:06:31', 'updated_at' => '2022-05-04 11:06:31']);
    }
}
