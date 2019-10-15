<?php

namespace Softworx\RocXolid\Admin;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

/**
 * RocXolid Admin package service provider.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * @var array $config_files Configuration files to be published and loaded.
     */
    protected $config_files = [
        'rocXolid.admin.general' => '/../config/general.php',
        'rocXolid.admin.layout' => '/../config/layout.php',
        'rocXolid.admin.sidebar' => '/../config/sidebar.php',
    ];

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(Providers\ConfigurationServiceProvider::class);
        $this->app->register(Providers\ViewServiceProvider::class);
        $this->app->register(Providers\RouteServiceProvider::class);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

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
            __DIR__ . '/../config/layout.php' => config_path('rocXolid/admin/layout.php'),
            __DIR__ . '/../config/sidebar.php' => config_path('rocXolid/admin/sidebar.php'),
        ], 'config');

        // views files
        // php artisan vendor:publish --provider="Softworx\RocXolid\Admin\ServiceProvider" --tag="views" (--force to overwrite)
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/softworx/rocxolid-admin'),
        ], 'views');

        return $this;
    }
}
