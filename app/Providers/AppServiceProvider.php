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
        Schema::defaultStringLength(191);

        // tramite singleton importiamo il gateway di braintree
        $this->app->singleton(Gateway::class, function ($app) {
            // all' interno del Gateway passiamo le chiavi di braintree
            return new Gateway([
                "environment" => "sandbox",
                "merchantId" => "2tb4wq3yx2wm33nj",
                "publicKey" => "r9m8vxj384g343d2",
                "privateKey" => "c5198ba4bad0934aff1f1423fc8fb5e5"
            ]);
        });
    }
}
