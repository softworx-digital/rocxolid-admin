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
// rocXolid common traits
use Softworx\RocXolid\Common\Http\Traits as CommonTraits;

/**
 * Default admin dashboard controller (for logged in user).
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class Controller extends AbstractController implements Dashboardable
{
    use DashboardableTrait;
    use CommonTraits\DetectsWeb;

    protected static $dashboard_type = AdminDashboard::class;

    // protected $translation_param = 'rocXolid-admin';

    public function index(Request $request)
    {
        return $this->getDashboard()->render();
    }

    public function error(Request $request, \Exception $exception = null)
    {
        return $this->getDashboard()->render('error', [
            'web' => $this->detectOnlyWeb($request),
        ]);
    }

    public function notFound(Request $request, \Exception $exception = null)
    {
        return $this->getDashboard()->render('not-found', [
            'web' => $this->detectOnlyWeb($request),
        ]);
    }
}
