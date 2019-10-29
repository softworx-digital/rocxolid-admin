<?php

namespace Softworx\RocXolid\Admin;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

/**
 * rocXolid Admin package service provider.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(Providers\ConfigurationServiceProvider::class);
        $this->app->register(Providers\CommandServiceProvider::class);
        $this->app->register(Providers\AuthServiceProvider::class);
        $this->app->register(Providers\ViewServiceProvider::class);
        $this->app->register(Providers\RouteServiceProvider::class);
        $this->app->register(Providers\TranslationServiceProvider::class);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this
            ->publish();
    }

    /**
     * Expose config files and resources to be published.
     *
     * @return \Illuminate\Support\ServiceProvider
     */
    private function publish(): IlluminateServiceProvider
    {
        // config files
        // php artisan vendor:publish --provider="Softworx\RocXolid\Admin\ServiceProvider" --tag="config" (--force to overwrite)
        $this->publishes([
            __DIR__ . '/../config/general.php' => config_path('rocXolid/admin/general.php'),
            __DIR__ . '/../config/auth.php' => config_path('rocXolid/admin/auth.php'),
            __DIR__ . '/../config/layout.php' => config_path('rocXolid/admin/layout.php'),
            __DIR__ . '/../config/sidebar.php' => config_path('rocXolid/admin/sidebar.php'),
        ], 'config');

        // lang files
        // php artisan vendor:publish --provider="Softworx\RocXolid\Admin\ServiceProvider" --tag="views" (--force to overwrite)
        $this->publishes([
            //__DIR__ . '/../resources/lang' => resource_path('lang/vendor/softworx/rocXolid/admin'),
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/rocXolid:admin'),
        ], 'views');

        // views files
        // php artisan vendor:publish --provider="Softworx\RocXolid\Admin\ServiceProvider" --tag="views" (--force to overwrite)
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/softworx/rocXolid/admin'),
        ], 'views');

        return $this;
    }
}
