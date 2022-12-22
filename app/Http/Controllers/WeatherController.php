<?php

namespace App\Http\Controllers;

use App\Contracts\ApiInterface;
use Inertia\Inertia;

class WeatherController extends Controller
{
    public function __construct(protected ApiInterface $apiInterface) {}

    public function index(ApiInterface $apiInterface)
    {
        return Inertia::render('Home', [
            'weather' => $apiInterface->fetchWeather(51.5606, 5.0919),
            'forecast' => $apiInterface->fetchForecast(51.5606, 5.0919)
        ]);
    }
}
