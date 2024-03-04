<?php

namespace App\Enum;

enum PaymentEnum: int
{
    case BANK_CARD = 1;
    case CASH = 2;

    public static function toArray()
    {
        return array_column(self::cases(), 'value');
    }
}
