<?php

namespace App\Filter\Transactions\Filters;

class StatusCode implements Filter
{
    public static function apply($transactions, $value)
    {
        return $transactions->where('status', $value);
    }
}
