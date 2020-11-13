<?php

namespace Akhaled\LivewireAccountPreferences;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireSweetalertServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // register our controller
        // $this->app->make('Devdojo\Calculator\CalculatorController');

        // load views
        // $this->loadViewsFrom(__DIR__ . '/views', 'livewire:sweetalert');

        // publish config
        $this->publishes([__DIR__ . '/config/livewire-sweetalert.php' => config_path('livewire-sweetalert.php')], 'livewire-sweetalert-config');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // merge configurations
        $this->mergeConfigFrom(__DIR__ . '/config/livewire-sweetalert.php', 'livewire-sweetalert');
    }
}
