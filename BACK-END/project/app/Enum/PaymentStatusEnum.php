<?php

namespace App\Enum;

enum PaymentStatusEnum: int
{
    case NOT_PAID = 1;
    case PAID = 2;

    public static function toArray()
    {
        return array_column(self::cases(), 'value');
    }
}
