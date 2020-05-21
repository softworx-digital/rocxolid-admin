<?php

/**
 *--------------------------------------------------------------------------
 * Auth configuration.
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
        'profile' => 'profile',
        'settings' => 'settings',
        'unauthorized' => 'unauthorized',
        'ping' => 'ping',
        'registration' => 'registration',
        'forgot-password' => 'forgot-password',
        'reset-password' => 'reset-password',
    ],
    /**
     * Defines the ability for users to register to the administration.
     */
    'registration_enabled' => true,
    /**
     * Defines the ability for users to reset the password.
     */
    'forgot_password_enabled' => true,
    /**
     * Defines where to redirect user after he's been just registered.
     */
    'registration_redirect' => 'rocXolid.auth.profile',
    /**
     * Defines where to redirect user after he's been just logged in.
     */
    'login_redirect' => 'rocXolid.auth.profile',
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
    /**
     * Passwords reset config.
     */
    'passwords' => [
        'rocXolid' => [
            'provider' => 'rocXolid',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
    /**
     * @todo: "hotfixed"
     */
    'admin_role_id' => 1,
];
