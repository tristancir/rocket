<?php

namespace App\Providers;

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
        \DB::listen(
            function($sql) {
                \Illuminate\Support\Facades\Log::channel('sql')->debug('sql = '.var_export($sql->sql, true));
                \Illuminate\Support\Facades\Log::channel('sql')->debug('bindings = '.var_export($sql->bindings, true));
            }
        );
    }
}
