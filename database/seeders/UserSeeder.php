<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['id' => 1, 'name' => 'Admin', 'email' => 'diamondPetdiamond@gmail.com', 'email_verified_at' => '2021-10-27 00:23:38', 'password' => '$2y$10$Gu3xYrBdY4lk6TqixG8c7.Y6HmYs7wkZwUbN8PNGJfhXdf9sbZj9C', 'two_factor_secret' => NULL, 'two_factor_recovery_codes' => NULL, 'remember_token' => NULL, 'current_team_id' => NULL, 'profile_photo_path' => NULL, 'created_at' => '2021-10-27 17:43:47', 'updated_at' => NULL, 'role' => 1, 'phone' => '123456789', 'dob' => '1995-24-02', 'gender' => '1', 'cmt' => NULL, 'address' => NULL]);
        User::create(['id' => 2, 'name' => 'Thắng', 'email' => 'summer@fpt.com.vn', 'email_verified_at' => '2022-04-22 08:31:00', 'password' => '$2y$10$92LtAeytGX3rZ11CdsH1suWJFYmReh2XOjM4XbrNDKT/lnopm9XWO', 'two_factor_secret' => NULL, 'two_factor_recovery_codes' => NULL, 'remember_token' => NULL, 'current_team_id' => NULL, 'profile_photo_path' => NULL, 'created_at' => '2022-04-22 08:31:00', 'updated_at' => '2022-04-22 15:06:37', 'role' => 2, 'phone' => '0972642142', 'dob' => '1948-17-11', 'gender' => '1', 'cmt' => NULL, 'address' => NULL]);
        User::create(['id' => 3, 'name' => 'Phương', 'email' => 'vuphuong7599@gmail.com', 'email_verified_at' => '2022-04-22 08:37:19', 'password' => '$2y$10$MGJvvN.qYMz3Xpq9cLEwhuajq6wib/RW2wnGHEK3leTjyCAnSjjba', 'two_factor_secret' => NULL, 'two_factor_recovery_codes' => NULL, 'remember_token' => 'Dlm4GdT4zBNpMapq3UCj5MEUxXkXHZJ0SuAg4PNOEq6REmTJYRnFjcF7shh2', 'current_team_id' => NULL, 'profile_photo_path' => NULL, 'created_at' => '2022-04-22 08:37:19', 'updated_at' => '2022-05-03 08:11:18', 'role' => 4, 'phone' => '0915871395', 'dob' => '1937-10-16', 'gender' => '1', 'cmt' => NULL, 'address' => NULL]);
        User::create(['id' => 4, 'name' => 'Vũ Việt Phương', 'email' => 'phuong@gmail.com', 'email_verified_at' => '2022-04-22 14:33:11', 'password' => '$2y$10$DfPBQHM9rRc7FPgju5TziuGOkGJNTAdYdP0mErDsPzu.JVeWdecgG', 'two_factor_secret' => NULL, 'two_factor_recovery_codes' => NULL, 'remember_token' => NULL, 'current_team_id' => NULL, 'profile_photo_path' => NULL, 'created_at' => '2022-04-22 14:33:11', 'updated_at' => '2022-04-22 14:33:11', 'role' => 2, 'phone' => '0915871395', 'dob' => '1950-18-11', 'gender' => '1', 'cmt' => NULL, 'address' => NULL]);
        User::create(['id' => 5, 'name' => 'Đặng Tiến Thành', 'email' => 'Thanh123@gmail.com', 'email_verified_at' => '2022-04-22 14:34:38', 'password' => '$2y$10$KvYrx5p1BfdC9NvYajPiPeV.5P5BbuMs1xOT2Tap3wHiEvaFQo6Au', 'two_factor_secret' => NULL, 'two_factor_recovery_codes' => NULL, 'remember_token' => NULL, 'current_team_id' => NULL, 'profile_photo_path' => NULL, 'created_at' => '2022-04-22 14:34:38', 'updated_at' => '2022-04-22 14:34:38', 'role' => 3, 'phone' => '0912312312', 'dob' => '1947-18-11', 'gender' => '1', 'cmt' => NULL, 'address' => NULL]);
        User::create(['id' => 6, 'name' => 'Hải', 'email' => 'hai123@gmail.com', 'email_verified_at' => '2022-04-23 11:47:01', 'password' => '$2y$10$OEMbI7mMJMtByyFlS2FSU.1BqOg83T3sieR1C.1ObXjDR.KnLj/yW', 'two_factor_secret' => NULL, 'two_factor_recovery_codes' => NULL, 'remember_token' => NULL, 'current_team_id' => NULL, 'profile_photo_path' => NULL, 'created_at' => '2022-04-23 11:47:01', 'updated_at' => '2022-04-23 11:47:01', 'role' => 4, 'phone' => '0915871395', 'dob' => '1950-18-11', 'gender' => '1', 'cmt' => NULL, 'address' => NULL]);
        User::create(['id' => 10, 'name' =>  'Vũ Việt Phương', 'email' => 'phuongvvhe130189@fpt.edu.vn', 'email_verified_at' => '2022-05-03 08:45:13', 'password' => '$2y$10$h1wPtbqgXsLxjz96SN0DYODm3PBmCxio.47IMkSYZtaGjySDaGHuq', 'two_factor_secret' => NULL, 'two_factor_recovery_codes' => NULL, 'remember_token' => NULL, 'current_team_id' => NULL, 'profile_photo_path' => NULL, 'created_at' => '2022-05-03 08:44:46', 'updated_at' => '2022-05-03 08:45:13', 'role' => 4, 'phone' => '0901000000', 'dob' => '1948-12-18', 'gender' => '1', 'cmt' => NULL, 'address' => NULL]);
    }
}
