<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use App\Constants\CacheKeys;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Store the timezone in cache.
         *
         * @param string $timezone
         * @param int $duration
         * @return void
         */
        Cache::macro('storeTimezone', function (string $timezone, int $duration = 60): void {
            $cacheKey = CacheKeys::USER_TIMEZONE;
            Cache::put($cacheKey, $timezone, $duration);
        });

        /**
         * Retrieve the timezone from cache.
         *
         * @return string|null
         */
        Cache::macro('getTimezone', function (): ?string {
            $cacheKey = CacheKeys::USER_TIMEZONE;
            return Cache::get($cacheKey);
        });
    }
}
