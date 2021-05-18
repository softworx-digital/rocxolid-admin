<?php

namespace Softworx\RocXolid\Admin\Auth\Events;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
// rocXolid communication event contracts
use Softworx\RocXolid\Communication\Events\Contracts\Sendable;
// rocXolid communication models
use Softworx\RocXolid\Communication\Models\EmailNotification;
// rocXolid common models
use Softworx\RocXolid\Common\Models\Language;
// rocXolid user management models
use Softworx\RocXolid\UserManagement\Models\User;

// @todo revise
class UserForgotPassword implements Sendable
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public static function getNotificationTypes(): Collection
    {
        return collect([
            EmailNotification::class,
        ]);
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

    public function getLanguage(): ?Language
    {
        return null;
    }
}
