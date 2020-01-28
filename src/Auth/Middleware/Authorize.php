<?php

namespace Softworx\RocXolid\Admin\Auth\Middleware;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Factory as Auth;

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

    public function handle(Request $request, \Closure $next, $guard = null)
    {
        return $next($request);
    }
}
