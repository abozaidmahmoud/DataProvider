<?php

namespace App\Responders;

use App\Http\Resources\TransactionsCollection;
use App\Infrastructure\Responders\Responder;

class ListTransactionsResponder extends Responder
{
    public function respond()
    {
        return new TransactionsCollection($this->getResponse());
    }
}
