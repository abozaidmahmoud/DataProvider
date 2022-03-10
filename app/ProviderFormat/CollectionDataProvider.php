<?php

/**
 * THIS provider responsible for convert data to collection to make filtration on this data
 * @response collection
 */

namespace App\ProviderFormat;

use Illuminate\Support\Collection;

class CollectionDataProvider implements Provider
{
    public function transactions() :Collection
    {
        $transactions = [];
        //read all transactions in json files exists in directory DataProvider
        foreach(new \DirectoryIterator(base_path('app/DataProvider')) as $file)
        {
            if($file->isDot()) continue;
            $json = file_get_contents($file->getPathName());
            $data = json_decode($json,true);
            $provider_name = ucwords(array_keys($data)[0]);
            $transactions[] = $this->providerDataMapper($provider_name, $data[$provider_name]);
        }

        return collect(call_user_func_array('array_merge', $transactions));
    }

    /**
     * @param $provider_name
     * @param $data
     * make generic keys for all providers objects like [currency, amount, id, ...]
     * @return collect
     */
    protected function providerDataMapper($provider_name, $data)
    {
        $provider = 'App\TransactionFormat\\'.$provider_name;
        return $provider::format($provider_name, $data);
    }

}
