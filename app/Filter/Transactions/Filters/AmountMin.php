<?php

namespace App\Filter\Transactions\Filters;

class AmountMin implements Filter
{
    public static function apply($transactions, $value)
    {
        if(!empty(request('amountMin')) && !empty(request('amountMax')))
             return $transactions->whereBetween('amount', [request('amountMin'), request('amountMax')]);
    }
}
