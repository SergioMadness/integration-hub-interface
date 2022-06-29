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

        $this->app->booted(static function () {
            /** @var Navigation $navigator */
            $navigator = app(Navigation::class);
            $navigator->addItem('InterfaceHUB::applications', 'IntegrationHub::navigation.application', static function () {
                return route('InterfaceHUB::applications');
            });
        });
    }

    public function register(): void
    {
    }
}