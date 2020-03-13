<?php

namespace Softworx\RocXolid\Admin\Auth\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Auth\User;
// rocXolid admin auth data holders
use Softworx\RocXolid\Admin\Auth\DataHolders\AbstractUserActivity;
use Softworx\RocXolid\Admin\Auth\DataHolders\GeneralUserActivity;
use Softworx\RocXolid\Admin\Auth\DataHolders\LogoutUserActivity;

/**
 * Service to handle user activity.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class UserActivityService
{
    const CACHE_KEY_FORMAT = 'user-%s-activity';

    /**
     * Put user activity data to cache.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Foundation\Auth\User $user
     * @param string $activity_class
     * @return \Softworx\RocXolid\Admin\Auth\Services\UserActivityService
     */
    public function logUserActivity(Request $request, User $user, string $activity_class = GeneralUserActivity::class): UserActivityService
    {
        $activity = $activity_class::make(
            Carbon::now(),
            $request->ip(),
            $request->url(),
        );

        Cache::forever($this->getUserActivityCacheKey($user), $activity);

        return $this;
    }

    /**
     * Put user activity data to cache.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Foundation\Auth\User $user
     * @return \Softworx\RocXolid\Admin\Auth\DataHolders\AbstractUserActivity|null
     */
    public function getUserActivity(User $user): ?AbstractUserActivity
    {
        return Cache::get($this->getUserActivityCacheKey($user));
    }

    /**
     * Check if user is online.
     *
     * @param \Illuminate\Foundation\Auth\User $user
     * @return bool
     */
    public function isOnline(User $user): bool
    {
        return ($activity = $this->getUserActivity($user))
            && !$activity->is(LogoutUserActivity::class)
            && $activity->getTime()->gt($this->timeout());
    }

    /**
     * Get cache key.
     *
     * @param \Illuminate\Foundation\Auth\User $user
     * @return string
     */
    private function getUserActivityCacheKey(User $user): string
    {
        return sprintf(static::CACHE_KEY_FORMAT, $user->getKey());
    }

    /**
     * Get expiration time.
     *
     * @return \Carbon\Carbon
     */
    private function timeout(): Carbon
    {
        return Carbon::now()->subMinutes(config('session.lifetime'));
    }
}