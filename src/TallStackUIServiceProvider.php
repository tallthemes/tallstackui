<?php

namespace TallStackUI\TallStackUI;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use TallStackUI\TallStackUI\Http\Livewire\TallStackUI\Button\Primary;
use TallStackUI\TallStackUI\Http\Livewire\TallStackUI\Button\Success;
use TallStackUI\TallStackUI\Http\Livewire\TallStackUI\Input;

class TallStackUIServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'tallstackui');
        
        $this->loadComponents();
        
        $this->publishes([
                             __DIR__ . '/../config/tallstackui.php' => config_path('tallstackui.php')
                         ], 'config');
        
        $this->publishes([
                             __DIR__ . '/../views' => resource_path('views/vendor/tallstackui'),
                         ]);
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/tallstackui.php', 'tallstackui');
    }
    
    private function loadComponents()
    {
        Livewire::component('tallstackui.input', Input::class);
        Livewire::component('tallstackui.button.primary', Primary::class);
        Livewire::component('tallstackui.button.success', Success::class);
    }
}