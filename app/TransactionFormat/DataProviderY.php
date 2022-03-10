<?php

namespace App\TransactionFormat;

class DataProviderY extends transactionFormat
{
    public static function statusCode() :array
    {
        return  [100 => 'paid', 200 => 'pending', 300 => 'reject'];
    }

}
