<?php

namespace Softworx\RocXolid\Admin\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as IlluminateAuthServiceProvider;
// rocXolid utils
use Softworx\RocXolid\CrudRouter;
// rocXolid model contracts
use Softworx\RocXolid\Models\Contracts\Crudable;
// rocXolid admin auth guards
use Softworx\RocXolid\Admin\Auth\Guard;
// rocXolid admin auth middlewares
use Softworx\RocXolid\Admin\Auth\Middleware\Authenticate;
use Softworx\RocXolid\Admin\Auth\Middleware\Authorize;
use Softworx\RocXolid\Admin\Auth\Middleware\RedirectAuthenticated;
// @todo: dont'like it here since it's a different package,
// but registerPolicies() is from IlluminateAuthServiceProvider which this provider extends
// rocXolid user management policies
use Softworx\RocXolid\UserManagement\Policies\CrudPolicy;
use Softworx\RocXolid\UserManagement\Policies\UserPolicy;
use Softworx\RocXolid\UserManagement\Policies\PermissionPolicy;
// rocXolid user management models
use Softworx\RocXolid\UserManagement\Models\Permission;
use Softworx\RocXolid\UserManagement\Models\User;

/**
 * rocXolid authentication service provider.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class AuthServiceProvider extends IlluminateAuthServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Crudable::class => CrudPolicy::class,
        User::class => UserPolicy::class,
        Permission::class => PermissionPolicy::class,
    ];

    public function register()
    {
        $this->registerPolicies();
    }

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this
            ->setGuards()
            ->setProviders()
            ->setBrokers()
            ->setRoutes($this->app['router']);
    }

    private function setGuards()
    {
        $this->app->config['auth.guards'] = $this->app->config['auth.guards'] + config('rocXolid.admin.auth.guards');

        // @todo: does this actually work / is being executed??
        Auth::extend('rocXolid', function ($app, $name, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\Guard...
            dump(__METHOD__);
            dd($config);
            return new Guard(Auth::createUserProvider($config['provider']));
        });

        return $this;
    }

    private function setProviders()
    {
        $this->app->config['auth.providers'] = $this->app->config['auth.providers'] + config('rocXolid.admin.auth.providers');

        return $this;
    }

    private function setBrokers()
    {
        $this->app->config['auth.passwords'] = $this->app->config['auth.passwords'] + config('rocXolid.admin.auth.passwords');

        return $this;
    }

    private function setRoutes(Router $router)
    {
        $router->pushMiddlewareToGroup('rocXolid.guest', RedirectAuthenticated::class);
        $router->pushMiddlewareToGroup('rocXolid.auth', Authenticate::class);
        $router->pushMiddlewareToGroup('rocXolid.auth', Authorize::class);

        $router->group([
            'module' => 'rocXolid',
            'middleware' => [ 'web' ],
            'namespace' => 'Softworx\RocXolid\Admin\Auth\Controllers',
            'prefix' => config('rocXolid.admin.general.routes.root', 'rocXolid'),
            'as' => 'rocXolid.auth.',
        ], function ($router) {
            // unauthenticated
            $router->group([
                'middleware' => [ 'rocXolid.guest' ],
            ], function ($router) {
                $router->get(config('rocXolid.admin.auth.routes.login', 'login'), 'LoginController@index')->name('login');
                $router->post(config('rocXolid.admin.auth.routes.login', 'login'), 'LoginController@login')->name('login.submit');
                $router->get(config('rocXolid.admin.auth.routes.registration', 'registration'), 'RegistrationController@index')->name('registration');
                $router->post(config('rocXolid.admin.auth.routes.registration', 'registration'), 'RegistrationController@register')->name('registration.submit');
                $router->get(config('rocXolid.admin.auth.routes.forgot-password', 'forgot-password'), 'ForgotPasswordController@index')->name('forgot-password');
                $router->post(config('rocXolid.admin.auth.routes.forgot-password', 'forgot-password'), 'ForgotPasswordController@forgotPassword')->name('forgot-password.submit');
                $router->get(sprintf('%s/{token}', config('rocXolid.admin.auth.routes.reset-password', 'reset-password')), 'ResetPasswordController@index')->name('reset-password');
                $router->get(config('rocXolid.admin.auth.routes.reset-password', 'reset-password'), 'ResetPasswordController@invalid')->name('reset-password.invalid');
                $router->post(config('rocXolid.admin.auth.routes.reset-password', 'reset-password'), 'ResetPasswordController@passwordReset')->name('reset-password.submit');
            });
            // authenticated
            $router->group([
                'middleware' => [ 'rocXolid.auth' ],
            ], function ($router) {
                $router->get(config('rocXolid.admin.auth.routes.profile', 'profile'), 'ProfileController@index')->name('profile');
                $router->get(config('rocXolid.admin.auth.routes.settings', 'settings'), 'ProfileController@settings')->name('settings');
                $router->get(config('rocXolid.admin.auth.routes.logout', 'logout'), 'LoginController@logout')->name('logout');
                $router->get(config('rocXolid.admin.auth.routes.unauthorized', 'unauthorized'), 'UnauthorizedController@index')->name('unauthorized');
                $router->get(config('rocXolid.admin.auth.routes.ping', 'ping'), 'LoginController@ping')->name('ping');
            });
        });
    }
}
