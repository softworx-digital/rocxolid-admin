<?php

namespace Softworx\RocXolid\Admin\Auth\Middleware;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Factory as Auth;
use Softworx\RocXolid\Admin\Auth\Exceptions\AuthorizationException;
use Softworx\RocXolid\Http\Controllers\Contracts\Permissionable;

/**
 * rocXolid authorization middleware.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class Authorize
{
    /**
     * Create a new middleware instance.
     *
     * @param \Illuminate\Contracts\Auth\Factory $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
        $this->auth->shouldUse('rocXolid'); // guard definition
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Closure $next
     * @param string $guard
     * @return mixed
     * @throws \Softworx\RocXolid\Admin\Auth\Exceptions\AuthorizationException
     */
    public function handle(Request $request, \Closure $next, $guard = null)
    {
        $controller = $request->route()->getController();

        switch ($request->route()->getActionMethod()) {
            case 'repositoryAutocomplete':
                $action = 'autocomplete'; // @todo: hotfixed, you can do better
                break;
            default:
                $action = 'read-only';
        }

        if (($controller instanceof Permissionable) && !$controller->userCan($action)) {
            throw new AuthorizationException(__('rocXolid:admin::admin.auth.unauthorized'), $guard);
        }

        return $next($request);
    }
}
