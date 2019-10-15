<?php

namespace Softworx\RocXolid\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Softworx\RocXolid\Http\Controllers\AbstractController;
use Softworx\RocXolid\Admin\Components\Dashboard\Admin as AdminDashboard;

class Controller extends AbstractController
{
    public function index(Request $request)
    {
        return (new AdminDashboard($this))->render('default');
    }
}
