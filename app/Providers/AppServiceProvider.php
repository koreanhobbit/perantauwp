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
        view()->composer('admin.layouts.app', function($setting) {
            $setting->with('setting', \App\Setting::first());
        });

        view()->composer('admin.layouts.navs', function($setting) {
            $setting->with('setting', \App\Setting::first());
        });


        //######################################//
        //#########FRONT END Medicio############//
        //######################################//
        //setting for frontend medicio
        view()->composer('frontend.theme.medicio.layouts.master', function($setting) {
            $setting->with('setting', \App\Setting::first());
        });

        view()->composer('frontend.theme.medicio.main_page.sections.pricing', function($currencies) {
            $currencies->with('currencies', \App\Currency::get());
        });

        //######################################//
        //##########CUSTOMER BACKEND############//
        //######################################//
        view()->composer('admin_customer.layouts.nav', function($setting) {
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
