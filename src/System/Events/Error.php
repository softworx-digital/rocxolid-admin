<?php

namespace Softworx\RocXolid\Admin\System\Events;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
// rocXolid communication event contracts
use Softworx\RocXolid\Communication\Events\Contracts\Sendable;
// rocXolid common models
use Softworx\RocXolid\Common\Models\Error as ErrorModel;
use Softworx\RocXolid\Common\Models\Web;

/**
 * Event sent when system error (exception) occurs.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class Error implements Sendable
{
    /**
     * Error reference.
     *
     * @var \Softworx\RocXolid\Common\Models\Error
     */
    protected $error;

    /**
     * Web reference.
     *
     * @var \Softworx\RocXolid\Common\Models\Web
     */
    protected $web;

    /**
     * Constructor.
     *
     * @param \Softworx\RocXolid\Common\Models\Error $error
     * @param \Softworx\RocXolid\Common\Models\Web $web
     * @return \Softworx\RocXolid\Communication\Events\Contracts\Sendable
     */
    public function __construct(ErrorModel $error, Web $web)
    {
        $this->error = $error;
        $this->web = $web;
    }

    /**
     * {@inheritDoc}
     */
    public function getRecipients(): Collection
    {
        return collect();
    }

    /**
     * {@inheritDoc}
     */
    public function getSendableVariables(): array
    {
        return [ 'error' => $this->error, 'web' => $this->web ];
    }

    /**
     * {@inheritDoc}
     */
    public function getSendingModel(): Model
    {
        return $this->error;
    }
}
