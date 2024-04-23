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
        $this->app->bind('App\Contracts\BannerInterface',   'App\Repositories\BannerRepository');
        $this->app->bind('App\Contracts\BlogInterface',     'App\Repositories\BlogRepository');
        $this->app->bind('App\Contracts\CategoryInterface', 'App\Repositories\CategoryRepository');
        $this->app->bind('App\Contracts\CustomerInterface', 'App\Repositories\CustomerRepository');
        $this->app->bind('App\Contracts\ProductInterface',  'App\Repositories\ProductRepository');
        $this->app->bind('App\Contracts\SaleInterface',     'App\Repositories\SaleRepository');
        $this->app->bind('App\Contracts\RentInterface',     'App\Repositories\RentRepository');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
