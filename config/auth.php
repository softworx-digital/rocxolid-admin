<?php

/**
 *--------------------------------------------------------------------------
 * Authorization configuration.
 *--------------------------------------------------------------------------
 */
return [
    /**
     * Route path for administration environment authentication and registration.
     */
    'routes' => [
        'login' => 'login',
        'logout' => 'logout',
        'ping' => 'ping',
        'registration' => 'registration',
        'forgot-password' => 'forgot-password',
    ],
    /**
     * Guards config.
     */
    'guards' => [
        'rocXolid' => [
            'driver' => 'session',
            'provider' => 'rocXolid',
        ],
    ],
    /**
     * Providers config.
     */
    'providers' => [
        'rocXolid' => [
            'driver' => 'eloquent',
            'model' => \Softworx\RocXolid\UserManagement\Models\User::class,
        ],
    ],

];
