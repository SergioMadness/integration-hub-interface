<?php namespace professionalweb\IntegrationHub\VInterface\Providers;

use Illuminate\Support\ServiceProvider;

class InterfaceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('assets'),
        ], 'interface');
    }

    public function register(): void
    {
    }
}