<?php

namespace App\Http\Middleware;

use Facade\App\Services\IpService;
use Closure;
use Illuminate\Support\Facades\Auth;

class SetUserTimezone
{
    public function handle($request, Closure $next)
    {
        if (!app()->isLocal()) {
            $timezone = IpService::getLocalTime();
            dd($timezone);
            if ($timezone) {
                config(['geoip.default_location.timezone' => $timezone]);
            }
        }
        return $next($request);
    }
}
