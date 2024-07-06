<?php

namespace App\Http\Middleware;

use Closure;
use Facades\App\Services\IpService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class SetUserTimezone
{
    /**
     * Handle an incoming request.
     *
     * If the timezone is not cached, retrieves the local timezone using IP detection,
     * caches it, and optionally updates the default timezone configuration for local environments.
     *
     * @param Request $request The incoming HTTP request
     * @param Closure $next The next middleware closure
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Cache::getTimezone()) {
            $timezone = IpService::getLocalTime();
            Cache::storeTimezone($timezone);
        }

        if (app()->isLocal() && Auth::check()) {
            config(
                [
                    'geoip.default_location.timezone' => Cache::getTimezone()
                ]
            );
        }

        return $next($request);
    }
}
