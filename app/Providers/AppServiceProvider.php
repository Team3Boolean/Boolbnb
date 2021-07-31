<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Schema::defaultStringLength(191);
        $this->app->singleton(Gateway::class, function ($app) {
            // all' interno del Gateway passiamo le chiavi di braintree
            return new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'tprv3vsb38cpwphw',
                'publicKey' => 'sr2ky75mt5dvzff4',
                'privateKey' => '1a09ef8ee5d0f5ca9796a8cbf3d29bfb'
            ]);
        });
    }
}
