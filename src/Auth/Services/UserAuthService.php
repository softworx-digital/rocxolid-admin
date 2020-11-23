<?php

namespace Softworx\RocXolid\Admin\Auth\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
// rocXolid form contracts
use Softworx\RocXolid\Forms\Contracts\FormField;
// rocXolid user management models
use Softworx\RocXolid\UserManagement\Models\User;
use Softworx\RocXolid\UserManagement\Models\UserProfile;
// rocXolid auth events
use Softworx\RocXolid\Admin\Auth\Events\UserRegistered;

/**
 * Service to handle user authentication related actions.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class UserAuthService
{
    /**
     * Persist registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Softworx\RocXolid\UserManagement\Models\User
     * @todo: prettify
     */
    public function registerUser(Request $request): User
    {
        $data = $request->get(FormField::SINGLE_DATA_PARAM);

        $user = User::create([
            'name' => sprintf('%s %s', $data['first_name'], $data['last_name']),
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        $user_profile = UserProfile::create([
            'user_id' => $user->getKey(),
            'language_id' => $data['language_id'],
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'birthdate' => Carbon::parse($data['birthdate'])->format('Y-m-d'), // @todo: "hotfixed"
        ]);

        event(new UserRegistered($user));

        return $user;
    }
}
