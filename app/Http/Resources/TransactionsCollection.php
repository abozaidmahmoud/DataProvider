<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionsCollection extends ResourceCollection
{
    public static $wrap = 'transactions';

    public function toArray($request)
    {
        return TransactionResource::collection($this->collection);
    }
}
