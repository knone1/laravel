<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Settings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        
    //    view()->share('setting', $setting);
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
