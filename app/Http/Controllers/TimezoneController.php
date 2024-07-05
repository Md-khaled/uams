<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JamesMills\LaravelTimezone\Facades\Timezone;

class TimezoneController extends Controller
{
    public function index(Request $request)
    {
        dd(Timezone::convertToLocal());
        $timezone = $request->session()->get('timezone');
        dd($timezone);

        // Log the timezone
        Log::info('User Timezone: ' . $timezone);

        // Return a response
        return view('welcome');
    }
}
