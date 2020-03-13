<?php

namespace Softworx\RocXolid\Admin\Auth\Http\Middleware;

use Illuminate\Http\Request;
// rocXolid admin auth services
use Softworx\RocXolid\Admin\Auth\Services\UserActivityService;

/**
 * rocXolid last user activity middleware.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class LastUserActivity
{
    /**
     * @var \Softworx\RocXolid\Admin\Auth\Services\UserActivityService
     */
    private $user_activity_service;

    /**
     * Create a new middleware instance.
     *
     * @param \Illuminate\Contracts\Auth\Factory $auth
     * @return void
     */
    public function __construct(UserActivityService $user_activity_service)
    {
        $this->user_activity_service = $user_activity_service;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        $this->user_activity_service->logUserActivity($request, auth('rocXolid')->user());

        return $next($request);
    }
}
