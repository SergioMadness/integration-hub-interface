<?php namespace professionalweb\IntegrationHub\VInterface\Providers;

use Illuminate\Support\ServiceProvider;

class InterfaceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/public' => public_path(),
        ], 'interface');
    }

    public function register(): void
    {
    }
}