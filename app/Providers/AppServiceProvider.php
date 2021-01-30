<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SearchProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SearchProvider::class, function ($app) {
            return new SearchProvider;
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
