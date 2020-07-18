<?php

namespace App\Providers;

use App\TelkomRegional;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
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
        View::share('tregList', Cache::remember('treg-list', now()->addDay(), function () {
            return TelkomRegional::get();
        }));
    }
}
