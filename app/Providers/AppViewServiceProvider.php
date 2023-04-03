<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppViewServiceProvider extends ServiceProvider
{

    public function register(): void
    {
       
    }

    public function boot(): void
    {
        View::composer(['auth.login','auth.register'], function ($view) {
            $site_setting = SiteSetting::get();
            $view->with(compact('site_setting'));
        });
    }
}
