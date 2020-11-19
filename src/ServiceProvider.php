<?php

namespace Akhaled\LivewireSweetalert;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // register our traits
        // $this->app->make('Akhaled\LivewireSweetalert\Toast');

        // load views
        $this->loadViewsFrom(__DIR__ . '/views', 'livewire-sweetalert');

        // inject required javascript
        Blade::include('livewire-sweetalert::js', 'livewireSweetalertScripts');

        // publish config
        $this->publishes([__DIR__ . '/../config/livewire-sweetalert.php' => config_path('livewire-sweetalert.php')], 'livewire-sweetalert-config');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // merge configurations
        $this->mergeConfigFrom(__DIR__ . '/../config/livewire-sweetalert.php', 'livewire-sweetalert');
    }
}