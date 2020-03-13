<?php

namespace Softworx\RocXolid\Admin\Auth\DataHolders;

use Softworx\RocXolid\Admin\Auth\DataHolders\AbstractUserActivity;

/**
 * Data holder for logout user activity.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class LogoutUserActivity extends AbstractUserActivity
{
    /**
     * {@inheritDoc}
     */
    protected $activity = 'logout';
}
