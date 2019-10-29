<?php

namespace Softworx\Rocxolid\Admin\Providers;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

/**
 * rocXolid translation service provider.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class TranslationServiceProvider extends IlluminateServiceProvider
{
    /**
     * Bootstrap rocXolid translation services.
     *
     * @return \Illuminate\Support\ServiceProvider
     */
    public function boot()
    {
        $this
            ->load();

        return $this;
    }

    /**
     * Load translations.
     *
     * @return \Illuminate\Support\ServiceProvider
     */
    private function load()
    {
        // customized translations preference
        // @TODO: doesn't quite work this way - either create custom translation loader and bind it to SL
        // @TODO: or publish to resources/lang/vendor/rocXolid:admin
        // $this->loadTranslationsFrom(resource_path('lang/vendor/softworx/rocXolid/admin'), 'rocXolid:admin');

        // pre-defined translations fallback
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'rocXolid');

        return $this;
    }
}
