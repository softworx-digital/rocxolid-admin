<?php

/**
 *--------------------------------------------------------------------------
 * Authorization configuration.
 *--------------------------------------------------------------------------
 */
return [
    /**
     * Flag for the authentification requirement.
     * @todo: not working currently
     */
    'authentication_required' => true,
    /**
     * Flag if permissions should be checked.
     */
    'check_permissions' => true,
    /**
     * Flag if permissions should be checked even for root user (ID = 1) .
     */
    'check_permissions_root' => false,
    /**
     * Route path for administration environment authentication and registration.
     */
    'routes' => [
        'login' => 'login',
        'logout' => 'logout',
        'unauthorized' => 'unauthorized',
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
