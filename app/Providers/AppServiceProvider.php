<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
        Schema::defaultStringLength("125");
        if (Auth::check())
        {
            if (Auth::user()->hasAnyRole(["doctor", "laboratory"]))
            {
                Carbon::macro('isDayOff', function ($date) {
                    return $date->isSaturday() || $date->isFriday();
                });
            }
        }
    }
}
