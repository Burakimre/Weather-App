<?php

namespace App\Http\Controllers;

use App\Contracts\ApiInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class WeatherController extends Controller
{
    public function __construct(protected ApiInterface $apiInterface) {}

    public function index(ApiInterface $apiInterface)
    {
        $ip = "94.214.25.246" ?? $_SERVER['REMOTE_ADDR'];
        ['lat' => $lat, 'lon' => $lon] = Http::get("http://ip-api.com/json/{$ip}")->json();

        return Inertia::render('Home', [
            'weather' => $apiInterface->fetchWeather($lat, $lon),
            'forecast' => $apiInterface->fetchForecast($lat, $lon)
        ]);
    }
}
