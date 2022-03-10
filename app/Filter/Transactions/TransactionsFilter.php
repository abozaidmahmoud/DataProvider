<?php

namespace App\Filter\Transactions;

/**
 *apply  Decorators pattern on transactions search
 */

class TransactionsFilter
{
    public static function apply($filters, $transactions)
    {
        $transactions = static::applyDecoratorsFromRequest($filters, $transactions);
        return $transactions;
    }

    private static function applyDecoratorsFromRequest($filters, $transactions)
    {
        foreach ($filters as $filterName => $value) {
            if (!is_null($value)) {
                $decorator = static::createFilterDecorator($filterName);
                if (static::isValidDecorator($decorator)) {
                    $transactions = $decorator::apply($transactions, $value);
                }
            }
        }
        return $transactions;
    }

    // return path of filter file
    private static function createFilterDecorator($name)
    {
        return  __NAMESPACE__ . '\\Filters\\' .
        str_replace(
            ' ',
            '',
            ucwords(str_replace('_', ' ', $name))
        );
    }
    // check if file exists
    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }
}
