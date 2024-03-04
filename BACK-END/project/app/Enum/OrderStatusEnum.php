<?php

namespace App\Enum;

enum OrderStatusEnum: int
{
    case READY = 1;
    case WAY = 2;
    case CREATED = 3;

    public static function toArray()
    {
        return array_column(self::cases(), 'value');
    }
}
