<?php

namespace Softworx\RocXolid\Admin\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as IlluminateAuthServiceProvider;
use Softworx\RocXolid\CrudRouter;
use Softworx\RocXolid\Admin\Auth\Guard;
use Softworx\RocXolid\Admin\Auth\Middleware\Authenticate;
use Softworx\RocXolid\Admin\Auth\Middleware\Authorize;
use Softworx\RocXolid\Admin\Auth\Middleware\RedirectAuthenticated;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
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
            ->setRoutes($this->app['router']);
    }

    private function setGuards()
    {
        $this->app->config['auth.guards'] = $this->app->config['auth.guards'] + config('rocXolid.admin.auth.guards');
        $this->app->config['auth.providers'] = $this->app->config['auth.providers'] + config('rocXolid.admin.auth.providers');

        Auth::extend('rocXolid', function ($app, $name, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\Guard...
dump(__METHOD__);
dd($config);
            return new Guard(Auth::createUserProvider($config['provider']));
        });

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
                $router->get(config('rocXolid.admin.general.routes.login', 'login'), 'LoginController@index')->name('login');
                $router->post(config('rocXolid.admin.general.routes.login', 'login'), 'LoginController@login')->name('login');
            });
            // authenticated
            $router->group([
                'middleware' => [ 'rocXolid.auth' ],
            ], function ($router) {
                $router->get(config('rocXolid.admin.general.routes.logout', 'logout'), 'LoginController@logout')->name('logout');
                $router->get(config('rocXolid.admin.general.routes.unauthorized', 'unauthorized'), 'UnauthorizedController@index')->name('unauthorized');
                $router->get(config('rocXolid.admin.general.routes.ping', 'ping'), 'LoginController@ping')->name('ping');
            });
        });
    }
}
