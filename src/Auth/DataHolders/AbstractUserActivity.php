<?php

namespace Softworx\RocXolid\Admin\Auth\DataHolders;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Auth\User;

/**
 * Data holder for user activity.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
abstract class AbstractUserActivity
{
    /**
     * @var \Carbon\Carbon
     */
    private $time;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string|null
     */
    protected $activity = null;

    /**
     * Constructor
     *
     * @param \Carbon\Carbon $time
     * @param string $ip
     * @param string $url
     * @param string|null $activity
     * @return \Softworx\RocXolid\Admin\Auth\DataHolders\LastActivity
     */
    private function __construct(Carbon $time, string $ip, string $url)
    {
        $this
            ->setTime($time)
            ->setIp($ip)
            ->setUrl($url);
    }

    /**
     * Static constructor.
     *
     * @param \Carbon\Carbon $time
     * @param string $ip
     * @param string $url
     * @param string|null $activity
     * @return \Softworx\RocXolid\Admin\Auth\DataHolders\LastActivity
     */
    public static function make(Carbon $time, string $ip, string $url, ?string $activity = null)
    {
        return new static($time, $ip, $url, $activity);
    }

    /**
     * Get the value of time.
     *
     * @return \Carbon\Carbon
     */
    public function getTime(): Carbon
    {
        return Carbon::make($this->time);
    }

    /**
     * Set the value of time.
     *
     * @param \Carbon\Carbon $time|null
     * @return \Softworx\RocXolid\Admin\Auth\DataHolders\LastActivity
     */
    public function setTime(Carbon $time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get the value of IP.
     *
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * Set the value of IP.
     *
     * @param string $ip|null
     * @return \Softworx\RocXolid\Admin\Auth\DataHolders\LastActivity
     */
    public function setIp(string $ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get the value of URL.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Set the value of URL.
     *
     * @param string $url
     * @return \Softworx\RocXolid\Admin\Auth\DataHolders\LastActivity
     */
    public function setUrl(string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Check if activity is of a particular type.
     *
     * @param string $type
     * @return bool
     */
    public function is(string $type)
    {
        return $this instanceof $type;
    }
}
