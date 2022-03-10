<?php

namespace App\Filter\Transactions\Filters;

class Currency implements Filter
{
    public static function apply($transactions, $value)
    {
        return $transactions->where('currency', $value);
    }
}
