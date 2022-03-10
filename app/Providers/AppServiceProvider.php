<?php

namespace App\Providers;

use App\ProviderFormat\CollectionDataProvider;
use App\ProviderFormat\Provider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //bin which provider we use in run time
        $this->app->bind(Provider::class, CollectionDataProvider::class);
    }

}
