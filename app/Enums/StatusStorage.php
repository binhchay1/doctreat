<?php

namespace App\Enums;

final class StatusStorage
{
    const APPROVED = 1;
    const DENIED = 2;
    const PENDING = 3;
    const DELETED = 4;

    public static function process()
    {
        return [
            '1' => 'Đã phê duyệt',
            '2' => 'Đã từ chối',
            '3' => 'Đang chờ phê duyệt',
            '4' => 'Đã hủy',
        ];
    }

    public static function processKeyByStatus($status)
    {
        $process = self::process();
        return $process[$status];
    }

    public static function processHtmlClass()
    {
        return [
            '1' => 'text-success',
            '2' => 'text-danger',
            '3' => 'text-warning',
            '4' => 'text-danger',
        ];
    }

    public static function processHtmlByStatus($status)
    {
        $process = self::processHtmlClass();
        return $process[$status];
    }
}
