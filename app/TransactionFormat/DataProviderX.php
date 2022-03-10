<?php

namespace App\TransactionFormat;

class DataProviderX extends transactionFormat
{

    private static $providerName;

    public static function statusCode() :array
    {
        return [1 => 'paid', 2 => 'pending', 3 => 'reject'];
    }

    public static function format($provider_name, $transactions)
    {
        self::$providerName = $provider_name;
        return array_map('self::basicTransactionFormat', $transactions);
    }

    private static function basicTransactionFormat($transaction): array
    {
        $data['provider'] = self::$providerName;
        $data['amount'] = $transaction['transactionAmount'];
        $data['currency'] = $transaction['Currency'];
        $data['phone'] = $transaction['senderPhone'];
        $data['status'] = self::statusCode()[$transaction['transactionStatus']];
        $data['created_at'] = $transaction['transactionDate'] ;
        $data['id'] = $transaction['transactionIdentification'];
        return $data;
    }


}
