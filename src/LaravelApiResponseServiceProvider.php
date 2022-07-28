<?php

namespace SudhanshuMittal\LaravelApiResponse;

use Illuminate\Support\ServiceProvider;

class LaravelApiResponseServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/api-response.php', 'api-response');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'api-response');

        $this->configurePublishing();
    }

    /**
     * Configure publishing for the package.
     *
     * @return void
     */
    private function configurePublishing()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/api-response.php' => config_path('api-response.php'),
        ], 'api-response-config');

        $this->publishes([
            __DIR__ . '/../resources/lang' => lang_path('vendor/api-response'),
        ], 'api-response-translations');
    }
}
