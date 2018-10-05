<?php

namespace Litecms\Faq\Providers;

use Illuminate\Support\ServiceProvider;

class FaqServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'faq');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'faq');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // Call pblish redources function
        $this->publishResources();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'litecms.faq');

        // Bind facade
        $this->app->bind('litecms.faq', function ($app) {
            return $this->app->make('Litecms\Faq\Faq');
        });

        // Bind Faq to repository
        $this->app->bind(
            'Litecms\Faq\Interfaces\FaqRepositoryInterface',
            \Litecms\Faq\Repositories\Eloquent\FaqRepository::class
        );
        // Bind Category to repository
        $this->app->bind(
            'Litecms\Faq\Interfaces\CategoryRepositoryInterface',
            \Litecms\Faq\Repositories\Eloquent\CategoryRepository::class
        );

        $this->app->register(\Litecms\Faq\Providers\AuthServiceProvider::class);

        $this->app->register(\Litecms\Faq\Providers\RouteServiceProvider::class);

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['litecms.faq'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('litecms/faq.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../resources/views' => base_path('resources/views/vendor/faq')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/faq')], 'lang');

        // Publish storage files
        $this->publishes([__DIR__ . '/../../storage' => base_path('storage')], 'storage');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
