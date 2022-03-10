<?php

namespace App\TransactionFormat;

abstract class transactionFormat
{
    private static $providerName;

    abstract static public function statusCode() :array;

    public static function format($provider_name, $transactions)
    {
        self::$providerName = $provider_name;
        return array_map('self::basicTransactionFormat', $transactions);
    }

    /**
     * @param $transaction
     * make default object for transactions
     * @return array
     */
    private static function basicTransactionFormat($transaction): array
    {
        $data['provider'] = self::$providerName;
        $data['amount'] = $transaction['amount'];
        $data['currency'] = $transaction['currency'];
        $data['phone'] = $transaction['phone'];
        $data['status'] = static::statusCode()[$transaction['status']];
        $data['created_at'] = $transaction['created_at'] ;
        $data['id'] = $transaction['id'];

        return $data;
    }
}
