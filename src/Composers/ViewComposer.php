<?php

namespace Softworx\RocXolid\Admin\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Auth\Guard;
// rocXolid services
use Softworx\RocXolid\Services\RouteService;
// rocXolid composer contracts
use Softworx\RocXolid\Composers\Contracts\Composer;

/**
 * Default Admin package composer.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid
 * @version 1.0.0
 */
class ViewComposer implements Composer
{
    /**
     * Route service to detect current route.
     *
     * @var \Softworx\RocXolid\Services\RouteService
     */
    protected $route_service;

    /**
     * The authentification service.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Constructor.
     *
     * @param \Softworx\RocXolid\Services\RouteService $route_service
     * @param \Illuminate\Contracts\Auth\Guard $auth
     * @return \Softworx\RocXolid\Composers\ViewComposer
     */
    public function __construct(RouteService $route_service, Guard $auth)
    {
        $this->route_service = $route_service;
        $this->auth = $auth;
    }

    /**
     * {@inheritdoc}
     */
    public function compose(View $view): Composer
    {
        $view
            ->with('user', $this->auth->user())
            ->with('route_method', $this->route_service->getMethod())
            ->with('view_name', $view->getName());

        return $this;
    }
}
