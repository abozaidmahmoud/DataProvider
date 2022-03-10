<?php

namespace App\Services;

use App\Filter\Transactions\TransactionsFilter;
use App\Infrastructure\Service\Service;
use App\ProviderFormat\Provider;


class ListTransactionsService implements Service
{

    private Provider $provider;

    public function __construct(Provider $provider)
    {
        $this->provider = $provider;
    }

    public function handle($request, $data = null)
    {
      return TransactionsFilter::apply($request, $this->provider->transactions());
    }

}
