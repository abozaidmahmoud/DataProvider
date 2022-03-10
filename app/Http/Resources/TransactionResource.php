<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray($request)
    {
        return[
           "amount" => $this['amount'],
           "currency" => $this['currency'],
           "phone" => $this['phone'],
           "status" => $this['status'],
           "created_at" => $this['created_at'],
           "id" => $this['id']
        ];
    }
}
