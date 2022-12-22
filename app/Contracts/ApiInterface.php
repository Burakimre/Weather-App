<?php

namespace App\Contracts;

use App\DTO\ForecastDTO;
use App\DTO\WeatherDTO;
use Illuminate\Support\Collection;

interface ApiInterface
{
    public function fetchWeather(float $latitude, float $longitude): WeatherDTO;
    public function fetchForecast(float $latitude, float $longitude): Collection;
}