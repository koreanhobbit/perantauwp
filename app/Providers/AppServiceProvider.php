<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //###############################//
        //###########BACKEND#############//
        //###############################//
        //icon tab for backend
        view()->composer('admin.layouts.app', function($icon) {
            $icon->with('iconImage', \App\Setting::first()->iconImage());
        });


        //######################################//
        //#########FRONT END Medicio############//
        //######################################//
        //setting for frontend medicio
        view()->composer('frontend.theme.medicio.layouts.master', function($setting) {
            $setting->with('setting', \App\Setting::first());
        });

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
