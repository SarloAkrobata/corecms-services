<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
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
         // Log all DB SELECT statements
    // @codeCoverageIgnoreStart
    if (!app()->environment('testing') && config('app.log_sql')) {
        DB::listen(function ($query) {
            if (preg_match('/^select/', $query->sql)) {
                Log::info('sql: ' .  $query->sql);
                // Also available are $query->bindings and $query->time.
            }
        });
    }
    }
}
