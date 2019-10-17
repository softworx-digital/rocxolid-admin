<?php

namespace Softworx\RocXolid\Admin\Auth\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Factory as Auth;

class RedirectAuthenticated
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
        $this->auth->shouldUse('rocXolid');
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Closure $next
     * @param string $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($this->auth->guard()->check()) {
            return redirect()->route('rocXolid.admin.index');
        }

        return $next($request);
    }
}
