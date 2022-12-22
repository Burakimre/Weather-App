<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ApiInterface;
use App\DTO\ForecastDTO;
use App\DTO\WeatherDTO;
use App\Traits\BuildBaseRequestTrait;
use App\Traits\CanSendGetRequestTrait;
use App\Traits\CanSendPostRequestTrait;
use Illuminate\Support\Collection;

class OpenWeatherMapApiService implements ApiInterface
{
    use BuildBaseRequestTrait;
    use CanSendGetRequestTrait;
    use CanSendPostRequestTrait;

    public function __construct(
        private readonly string $baseUrl,
        private readonly string $apiToken,
    ) {}

    public function fetchWeather(float $latitude, float $longitude): WeatherDTO
    {
        return WeatherDTO::default();

        // $response = $this->get(
        //     request: $this->buildRequestWithUrl(),
        //     url: '/weather',
        //     params: [
        //         'units' => 'metric',
        //         'lat' => $latitude,
        //         'lon' => $longitude
        //     ]
        // );

        // if (!$response->successful()) {
        //     return WeatherDTO::default();
        // }

        // $data = $response->json();

        // $data['lat'] = $latitude;
        // $data['lon'] = $longitude;

        // return WeatherDTO::fromOpenWeatherMap($data);
    }

    public function fetchForecast(float $latitude, float $longitude): Collection
    {
        $response = $this->get(
            request: $this->buildRequestWithUrl(),
            url: '/forecast',
            params: [
                'units' => 'metric',
                'lat' => $latitude,
                'lon' => $longitude
            ]
        );

        if (!$response->successful()) {
            return Collection::make();
        }

        $data = $response->json()['list'];

        return collect($data)->map(function($weather) use($latitude, $longitude) {
            $weather['lat'] = $latitude;
            $weather['lon'] = $longitude;

            return WeatherDTO::fromOpenWeatherMap($weather);
        });
    }
}