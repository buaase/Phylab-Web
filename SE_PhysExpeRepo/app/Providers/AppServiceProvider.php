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
        Validator::extend('studentId', function($attribute, $value, $parameters)
        {
            return preg_match('/^\d{8}$/', $value);
        });
        require app_path().'/Http/helper.php';
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
