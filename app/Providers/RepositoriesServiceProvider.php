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
        $this->app->bind('App\Contracts\BannerInterface',       'App\Repositories\BannerRepository');
        $this->app->bind('App\Contracts\BlogInterface',         'App\Repositories\BlogRepository');
        $this->app->bind('App\Contracts\CouponInterface',       'App\Repositories\CouponRepository');
        $this->app->bind('App\Contracts\CategoryInterface',     'App\Repositories\CategoryRepository');
        $this->app->bind('App\Contracts\CustomerInterface',     'App\Repositories\CustomerRepository');
        $this->app->bind('App\Contracts\EmployeeInterface',     'App\Repositories\EmployeeRepository');
        $this->app->bind('App\Contracts\FcmInterface',          'App\Repositories\FcmRepository');
        $this->app->bind('App\Contracts\ProductInterface',      'App\Repositories\ProductRepository');
        $this->app->bind('App\Contracts\SaleInterface',         'App\Repositories\SaleRepository');
        $this->app->bind('App\Contracts\RentInterface',         'App\Repositories\RentRepository');
        $this->app->bind('App\Contracts\MaintenenceInterface',  'App\Repositories\MaintenenceRepository');
        $this->app->bind('App\Contracts\TimeSlotInterface',     'App\Repositories\TimeSlotRepository');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
