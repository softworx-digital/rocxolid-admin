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

/**
 * Event sent when user is registered.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class UserRegistered implements Sendable
{
    protected $user;

    /**
     * Constructor.
     *
     * @param \Softworx\RocXolid\UserManagement\Models\User $user
     * @return \Softworx\RocXolid\Communication\Events\Contracts\Sendable
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * {@inheritDoc}
     */
    public static function getNotificationTypes(): Collection
    {
        return collect([
            EmailNotification::class,
        ]);
    }

    /**
     * Retrieve the user instance (being used for sending).
     *
     * @return \Softworx\RocXolid\UserManagement\Models\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * {@inheritDoc}
     */
    public function getRecipients(): Collection
    {
        return collect($this->user->email);
    }

    /**
     * {@inheritDoc}
     */
    public function getSendableVariables(): array
    {
        return [ 'user' => $this->user ];
    }

    /**
     * {@inheritDoc}
     */
    public function getSendingModel(): Model
    {
        return $this->user;
    }

    public function getLanguage(): ?Language
    {
        return null;
    }
}
