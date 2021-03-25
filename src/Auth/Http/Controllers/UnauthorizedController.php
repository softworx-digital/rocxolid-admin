<?php

namespace Softworx\RocXolid\Admin\Auth\Http\Controllers;

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
 * Controller for unauthorized actions.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class UnauthorizedController extends AbstractController implements Dashboardable
{
    use DashboardableTrait;

    protected static $dashboard_type = AdminDashboard::class;

    protected $translation_param = 'admin';

    public function index(Request $request)
    {
        return $this->getDashboard()->render();
    }
}
