<?php

namespace Softworx\RocXolid\Admin\Composers\Footer;

use Auth;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Collection;
use Softworx\RocXolid\Composers\Contracts\Composer as ComposerContract;

/**
 * Default footer composer.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid
 * @version 1.0.0
 */
class DefaultComposer implements ComposerContract
{
    /**
     * The authentification service.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Constructor.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     * @return \Softworx\RocXolid\Composers\ViewComposer
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * {@inheritdoc}
     */
    public function compose(View $view): ComposerContract
    {
        $view
            ->with('online_users', $this->getOnlineUsers());

        return $this;
    }

    /**
     * Get currently logged users.
     * 
     * @param int $timeout
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getOnlineUsers(int $timeout = 3600): Collection
    {
        if ($this->auth->user()) {
            return $this->auth->user()
                ->where('id', '!=', $this->auth->user()->id)
                ->where('last_action', '>', Carbon::now()->subSeconds($timeout)->toDateTimeString())
                ->where('logged_out', null)
                ->get();
        } else {
            return collect([]);
        }
    }
}
