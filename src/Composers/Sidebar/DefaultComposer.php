<?php

namespace Softworx\RocXolid\Admin\Composers\Sidebar;

use Illuminate\Contracts\View\View;
// rocXolid contracts
use Softworx\RocXolid\Contracts\Controllable as ControllableContract;
use Softworx\RocXolid\Contracts\Routable as RoutableContract;
// rocXolid controller contracts
use Softworx\RocXolid\Http\Controllers\Contracts\Crudable;
// rocXolid composer contracts
use Softworx\RocXolid\Composers\Contracts\Composer;
use Softworx\RocXolid\Components\Contracts\NavbarAccessible as NavbarAccessibleContract;
// rocXolid composers
use Softworx\RocXolid\Composers\AbstractComposer;
// rocXolid component exceptions
use Softworx\RocXolid\Components\Exceptions\UndefinedItemException;
use Softworx\RocXolid\Components\Exceptions\InvalidItemImplementationException;

/**
 * Default sidebar composer.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 * @todo refactor
 * @todo $config to collection
 */
class DefaultComposer extends AbstractComposer
{
    protected $translation_package = 'rocXolid-admin';

    protected $translation_param = 'admin';

    /**
     * {@inheritdoc}
     */
    public function compose(View $view): Composer
    {
        $view->with('sections', $this->parseConfig(config('rocXolid.admin.sidebar.sections')));

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
        $user = auth('rocXolid')->user();

        foreach ($config as $node) {
            if (!isset($node['item'])) {
                throw new UndefinedItemException($node);
            }

            if ($this->shouldMakeItem($user, $node)) {
                $item = $this->makeItem($node);

                if ($item->hasItems() || ($item instanceof RoutableContract)) {
                    $items[] = $item;
                }
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
    protected function shouldMakeItem($user, array $config): bool
    {
        // @todo hotfixed (or fine this way?)
        if (isset($config['controller']) && ($controller = app($config['controller'])) && ($controller instanceof Crudable)) {
            if (isset($config['permission'])) {
                return call_user_func($config['permission'], $user, $controller);
            }

            return $user->can('viewAny', [ $controller->getModelType(), $controller->getModelType() ]);
        } elseif (isset($config['permission'])) {
            return call_user_func($config['permission'], $user);
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

        if (isset($config['open-routes'])) {
            $item->setOpenOnRoutes($config['open-routes']);
        }

        if ($item instanceof ControllableContract) {
            $item->setController(app($config['controller']));
        }

        if ($item instanceof RoutableContract) {
            if (isset($config['route'])) {
                $item->setRouteName($config['route']);
            } elseif (isset($config['action'])) {
                $item->setRouteAction($config['action']);
            }
        }

        if (isset($config['target'])) {
            $item->setTarget($config['target']);
        }

        if (isset($config['add'])) {
            foreach ([$config['add']] as $subnodes) {
                if ($parsed = $this->parseConfig($subnodes)) {
                    $item->setItems($parsed);
                }
            }
        }

        if (isset($config['permission'])) {
            if (!is_callable($config['permission'])) {
                throw new \InvalidArgumentException(sprintf('The permission definition in [%s] is not callable', print_r($config, true)));
            }
        }

        return $item;
    }
}
