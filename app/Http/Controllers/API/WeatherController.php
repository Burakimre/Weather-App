<?php

namespace App\Http\Controllers\API;

use App\Contracts\ApiInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function __construct(protected ApiInterface $apiInterface) {}
    
    public function fetchWeather(Request $request, ApiInterface $apiInterface)
    {
        if (!$request->has('latitude') || !$request->has('longitude')) {
            return response()->json('You must provide a latitude and longitude.', 400);
        }

        return response()->json($apiInterface->fetchWeather($request->get('latitude'), $request->get('longitude')), 200);
    }

    public function fetchForecast(Request $request, ApiInterface $apiInterface)
    {
        if (!$request->has('latitude') || !$request->has('longitude')) {
            return response()->json('You must provide a latitude and longitude.', 400);
        }

        return response()->json($apiInterface->fetchForecast($request->get('latitude'), $request->get('longitude')), 200);
    }
}
