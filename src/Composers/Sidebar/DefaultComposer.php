<?php

namespace Softworx\RocXolid\Admin\Composers\Sidebar;

use Illuminate\Contracts\View\View;
use Softworx\RocXolid\Composers\Contracts\Composer;
use Softworx\RocXolid\Composers\AbstractComposer;
use Softworx\RocXolid\Services\RouteService;
use Softworx\RocXolid\Contracts\Controllable as ControllableContract;
use Softworx\RocXolid\Contracts\Routable as RoutableContract;
use Softworx\RocXolid\Components\Contracts\NavbarAccessible as NavbarAccessibleContract;
use Softworx\RocXolid\Components\Exceptions\UndefinedItemException;
use Softworx\RocXolid\Components\Exceptions\InvalidItemImplementationException;
use Softworx\RocXolid\Http\Controllers\Contracts\Permissionable;

/**
 * Default sidebar composer.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid
 * @version 1.0.0
 */
class DefaultComposer extends AbstractComposer
{
    protected $translation_package = 'rocXolid:admin';

    protected $translation_param = 'admin';

    /**
     * Route service to detect current route.
     * 
     * @todo Use this to set items' state appropriately
     * @var \Softworx\RocXolid\Services\RouteService
     */
    protected $route_service;

    /**
     * Constructor.
     * 
     * @param \Softworx\RocXolid\Services\RouteService $route_service
     * @return \Softworx\RocXolid\Admin\Composers\Sidebar\DefaultComposer
     */
    public function __construct(RouteService $route_service)
    {
        $this->route_service = $route_service;
    }

    /**
     * {@inheritdoc}
     */
    public function compose(View $view): Composer
    {
        $view
            ->with('sections', $this->parseConfig(config('rocXolid.admin.sidebar.sections')));

        return $this;
    }

    /**
     * Parse sidebar items structure configuration.
     * 
     * @param array $config
     * @return array
     */
    protected function parseConfig(array $config): array
    {
        $items = [];

        foreach ($config as $node) {
            if (!isset($node['item'])) {
                throw new UndefinedItemException($node);
            }

            if ($this->shouldMakeItem($node)) {
                $items[] = $this->makeItem($node);
            }
        }

        return $items;
    }

    /**
     * Check if the item should be created.
     * 
     * @param array $config
     * @return bool
     */
    protected function shouldMakeItem(array $config): bool
    {
        if (isset($config['controller'])) {
            $controller = resolve($config['controller']);

            if (($controller instanceof Permissionable) && !$controller->userCan('read-only')) {
                return false;
            }
        }
        
        return true;
    }

    /**
     * Create sidebar item element based in its configuration.
     * 
     * @param array $config
     * @return \Softworx\RocXolid\Components\Contracts\NavbarAccessible
     */
    protected function makeItem(array $config): NavbarAccessibleContract
    {
        $item = $config['item']::build($this, $this);

        if (!$item instanceof NavbarAccessibleContract) {
            throw new InvalidItemImplementationException($item, NavbarAccessible::class);
        }

        if (isset($config['title'])) {
            $item->setTitle($config['title']);
        }

        if (isset($config['icon'])) {
            $item->setIcon($config['icon']);
        }

        if ($item instanceof ControllableContract) {
            $item->setController(resolve($config['controller']));
        }

        if ($item instanceof RoutableContract) {
            if (isset($config['route'])) {
                $item->setRouteName($config['route']);
            } elseif (isset($config['method'])) {
                $item->setRouteMethod($config['method']);
            }
        }

        if (isset($config['target'])) {
            $item->setTarget($config['target']);
        }

        if (isset($config['add'])) {
            foreach (array($config['add']) as $subnodes) {
                $item->setItems($this->parseConfig($subnodes));
            }
        }

        return $item;
    }
}
