<?php

namespace App\Providers;
use Braintree;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'f3gwc3mtcqrm5b9n',
            'publicKey' => '97by27pprjngn4gh',
            'privateKey' => '6db2a6baf8fe2476765475ba321039ea'
        ]);
        Schema::defaultStringLength(191);
    }
}
