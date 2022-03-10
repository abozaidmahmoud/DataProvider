<?php

namespace App\Filter\Transactions\Filters;

class Provider implements Filter
{
    public static function apply($transactions, $value)
    {
        return $transactions->where('provider', $value);
    }
}
