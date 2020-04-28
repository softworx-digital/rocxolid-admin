<?php

namespace Softworx\RocXolid\Admin\Http\Controllers;

use Illuminate\Http\Request;
// rocXolid contracts
use Softworx\RocXolid\Http\Controllers\Contracts\Dashboardable;
// rocXolid controllers
use Softworx\RocXolid\Http\Controllers\AbstractController;
// rocXolid traits
use Softworx\RocXolid\Http\Controllers\Traits\Dashboardable as DashboardableTrait;
// rocXolid components
use Softworx\RocXolid\Admin\Components\Dashboard\Admin as AdminDashboard;

/**
 * Default admin dashboard controller (for logged in user).
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid
 * @version 1.0.0
 */
class Controller extends AbstractController implements Dashboardable
{
    use DashboardableTrait;

    protected static $dashboard_type = AdminDashboard::class;

    protected $translation_param = 'admin';

    public function index(Request $request)
    {
        return $this->getDashboard()->render();
    }
}
