<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\TrabalhoPortfolio;
use App\Observers\TrabalhoPortfolioObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        TrabalhoPortfolio::observe(TrabalhoPortfolioObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
