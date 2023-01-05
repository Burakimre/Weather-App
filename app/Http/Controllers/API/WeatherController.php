<?php

namespace App\Http\Controllers\API;

use App\DTO\WeatherDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function fetchWeather(Request $request)
    {
        if (!$request->has('latitude') || !$request->has('longitude')) {
            return response()->json('You must provide a latitude and longitude.', 400);
        }
    }
}
