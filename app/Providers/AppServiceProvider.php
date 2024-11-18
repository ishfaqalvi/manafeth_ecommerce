<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\{WhatsAppService, FCMService, AdminNotifyService};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(WhatsAppService::class, function ($app) {
            return new WhatsAppService();
        });
        $this->app->singleton(FCMService::class, function ($app) {
            return new FCMService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
