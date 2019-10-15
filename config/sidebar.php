<?php

/**
 *--------------------------------------------------------------------------
 * Configuration of left navbar items.
 *--------------------------------------------------------------------------
 *
 * This is the place to configure left navigation items in the following form:
 * 
 * ```
 * return [
 *     'sections' => [
 *          // section - group of top level items
 *         '<section-key>' => [
 *             'item' => <section-component-class>,
 *             'title' => '<section-lang-key>',
 *             // top level menu items
 *             'add' => [
 *                 '<first-level-lang-key>' => [
 *                     'item' => <first-level-item-component-class>,
 *                     'title' => '<first-level-item-lang-key>',
 *                     'controller' => <first-level-item-controller-class>,
 *                     'route' => '<first-level-item-route>'
 *                     'icon' => '<first-level-item-icon-css-class>',
 *                     // second level menu items
 *                     'add' => [
 *                        'orders' => [
 *                            'item' => <second-level-item-component-class>,
 *                            'title' => '<second-level-item-lang-key>',
 *                            'controller' => <second-level-item-controller-class>,
 *                            'route' => '<second-level-item-route>'
 *                        ],
 *                        ...
 *                     ],
 *                 ],
 *                 ...
 *             ],
 *         ],
 *         ...
 *     ],
 * ];
 * ```
 * 
 * Where:
 * 
 * - *<section-key>* is internal array reference to particular section
 * - *<section-component-class>* is component class to render the section, defaults to ```Softworx\RocXolid\Components\Navbar\Item::class```
 * - *<X-level-item-component-class>* is component class to render the menu item, defaults to ```Softworx\RocXolid\Components\Navbar\ActiveItem::class```
 * - *<X-level-item-controller-class>* references attached controller class, eg. ```Softworx\RocXolid\UserManagement\Http\Controllers\User\Controller::class```
 * - *<X-level-item-route>* is menu item action in the form of **route name**, eg. rocxolid.commerce.crud.shop.index
 */
return [
    'sections' => [
        
    ],
];