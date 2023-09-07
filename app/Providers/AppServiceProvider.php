<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

public function boot(): void
{
    Validator::extend('email_with_at_and_dot', function ($attribute, $value, $parameters, $validator) {
        // Memeriksa apakah alamat email mengandung "@" dan diikuti oleh tanda titik (.) dan diakhiri oleh "com" atau "id"
        return preg_match('/@.*\.[a-zA-Z]+$/', $value) === 1;
    });

}

}
