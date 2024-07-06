<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;

class IpService
{
    public function getLocalTime()
    {
        try {
            $ip = file_get_contents("http://ipecho.net/plain");

            if ($ip === false) {
                throw new Exception("Failed to get IP address");
            }

            $url = 'http://ip-api.com/json/' . $ip;
            $response = file_get_contents($url);

            if ($response === false) {
                throw new Exception("Failed to get response from IP API");
            }

            $data = json_decode($response, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception("Failed to decode JSON response");
            }

            if (!isset($data['timezone'])) {
                throw new Exception("Timezone information not found in API response");
            }
            return $data['timezone'];
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return Config::get('app.timezone');
        }
    }
}
