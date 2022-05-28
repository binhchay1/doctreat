<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InvoiceDoctorSeeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderLineSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(ProductCloneSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PromotionSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(StorageHistorySeeder::class);
        $this->call(StorageSeeder::class);
        $this->call(UserSeeder::class);
    }
}
