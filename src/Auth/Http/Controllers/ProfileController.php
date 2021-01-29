<?php

namespace Softworx\RocXolid\Admin\Auth\Http\Controllers;

use Auth;
// rocXolid utils
use Softworx\RocXolid\Http\Requests\CrudRequest;
// rocXolid controllers
use Softworx\RocXolid\Http\Controllers\AbstractController;
// rocXolid user management repositories
use Softworx\RocXolid\UserManagement\Repositories\User\Repository as UserRepository;
// rocXolid user management controllers
use Softworx\RocXolid\UserManagement\Http\Controllers\User\Controller as UserController;
// rocXolid user management models
use Softworx\RocXolid\UserManagement\Models\User;
use Softworx\RocXolid\UserManagement\Models\UserProfile;

class ProfileController extends AbstractController
{
    public function __construct(UserController $user_controller)
    {
        $this->user_controller = $user_controller;
    }

    public function index(CrudRequest $request)
    {
        return $this->user_controller->show($request, $request->user());
    }

    public function settings(CrudRequest $request)
    {
        dd(__METHOD__, '@todo');
    }
}
