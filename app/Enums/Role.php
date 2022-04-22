<?php

namespace App\Enums;

final class Role
{
    const ADMIN = 1;
    const DOCTOR = 2;
    const EMPLOYEE = 3;
    const CUSTOMER = 4;

    public static function process()
    {
        return [
            '1' => 'Quản lý',
            '2' => 'Bác sĩ',
            '3' => 'Nhân viên',
            '4' => 'Khách hàng'
        ];
    }

    public static function processKeyByRole($role)
    {
        $process = self::process();
        return $process[$role];
    }

    public static function processHtmlClass()
    {
        return [
            '1' => 'text-danger',
            '2' => 'text-success',
            '3' => 'text-warning',
            '4' => 'text-primary',
        ];
    }

    public static function processHtmlByRole($role)
    {
        $process = self::processHtmlClass();
        return $process[$role];
    }
}
