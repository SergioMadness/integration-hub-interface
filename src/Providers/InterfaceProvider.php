<?php namespace professionalweb\IntegrationHub\VInterface\Providers;

use Illuminate\Support\ServiceProvider;
use professionalweb\lms\InterfaceCommon\Interfaces\Navigation\Navigation;

class InterfaceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/assets/public' => public_path(),
        ], 'integration-hub-interface');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'InterfaceHub');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'InterfaceHub');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    public function register(): void
    {
    }
}