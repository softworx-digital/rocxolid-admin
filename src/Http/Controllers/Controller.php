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

class Controller extends AbstractController implements Dashboardable
{
    protected static $dashboard_class = AdminDashboard::class;

    use DashboardableTrait;

    public function index(Request $request)
    {
        return $this->getDashboard()->render();
    }
}
