<?php

namespace App\TransactionFormat;

class DataProviderW extends transactionFormat
{
    public static function statusCode() :array
    {
        return ['done' => 'paid', 'wait' => 'pending', 'nope' => 'reject'];
    }

}
