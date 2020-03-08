<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $models = [
            'Frontend' => [
                'Page',
                'Route'
            ],
        ];
        foreach ($models as $key => $model) {
            foreach ($model as $item) {
                $this->app->bind(
                    'App\Repositories\\' . $key . '\Contracts\\' . $item .'RepositoryInterface',
                    'App\Repositories\\' . $key . '\Eloquent\\' . $item . 'EloquentRepository'
                );
            }
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
