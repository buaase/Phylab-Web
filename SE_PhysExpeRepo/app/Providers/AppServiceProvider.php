<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        defind the constant of the app
        */
        define('SUCCESS_MESSAGE', "success");
        define('FAIL_MESSAGE',"fail");
        Validator::extend('studenId', function($attribute, $value, $parameters)
        {
            return preg_match('/^\d{8}$/', $value);
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
