<?php

namespace edgewizz\unwat;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class UnwatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Edgewizz\Unwat\Controllers\UnwatController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // dd($this);
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__ . '/components', 'unwat');
        Blade::component('unwat::unwat.open', 'unwat.open');
        Blade::component('unwat::unwat.index', 'unwat.index');
        Blade::component('unwat::unwat.edit', 'unwat.edit');
    }
}
