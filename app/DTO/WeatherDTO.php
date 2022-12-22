<?php

declare(strict_types=1);

namespace App\DTO;

final class WeatherDTO
{
    private function __construct(
        public readonly string $city,
        public readonly array $weather,
        public readonly array $temperature,
        public readonly array $wind,
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly int $date
    ) {
    }

    public static function fromOpenWeatherMap($data)
    {
        return new self(
            city: $data['name'] ?? 'Unknown',
            weather: [
                'icon' => $data['weather'][0]['icon'] ?? '',
                'name' => $data['weather'][0]['main'],
                'description' => $data['weather'][0]['description']
            ] ?? [],
            temperature: [
                'average' => $data['main']['temp'],
                'minimum' => $data['main']['temp_min'],
                'maximum' => $data['main']['temp_max'],
                'pressure' => $data['main']['pressure'],
                'humidity' => $data['main']['humidity']
            ] ?? [],
            wind: [
                'speed' => $data['wind']['speed'],
                'degrees' => $data['wind']['deg']
            ] ?? [],
            latitude: $data['lat'],
            longitude: $data['lon'],
            date: $data['dt'] ?? 0
        );
    }

    public static function default()
    {
        return new self(
            city: 'Los Angeles',
            weather: [
                'icon' => '03d',
                'name' => 'Clouds',
                'description' => 'scattered clouds'
            ],
            temperature: [
                'average' => 27.48,
                'minimum' => 27.48,
                'maximum' => 27.48,
                'pressure' => 1009,
                'humidity' => 68
            ],
            wind: [
                'speed' => 2.68,
                'degrees' => 179
            ],
            latitude: 0.0,
            longitude: 0.0,
            date: 0
        );
    }
}