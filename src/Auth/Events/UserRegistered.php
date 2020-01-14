<?php

namespace Softworx\RocXolid\Admin\Auth\Events;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Softworx\RocXolid\Communication\Events\Contracts\Sendable;
use Softworx\RocXolid\UserManagement\Models\User;

class UserRegistered implements Sendable
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getRecipients(): Collection
    {
        return collect($this->user->email);
    }

    public function getSendableVariables(): array
    {
        return [ 'user' => $this->user ];
    }

    public function getSendingModel(): Model
    {
        return $this->user;
    }
}
