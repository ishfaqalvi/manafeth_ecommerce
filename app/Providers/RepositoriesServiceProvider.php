<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Contracts\BannerInterface','App\Repositories\BannerRepository');
        $this->app->bind('App\Contracts\ProductInterface','App\Repositories\ProductRepository');
        $this->app->bind('App\Contracts\SaleInterface','App\Repositories\SaleRepository');
        $this->app->bind('App\Contracts\RentInterface','App\Repositories\RentRepository');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
