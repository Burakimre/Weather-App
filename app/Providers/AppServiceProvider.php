<?php

namespace App\Providers;

use App\Contracts\ApiInterface;
use App\Services\OpenWeatherMapApiService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(
            abstract: ApiInterface::class,
            concrete: fn () => new OpenWeatherMapApiService(
                baseUrl: config('services.openweathermap.url'),
                apiToken: config('services.openweathermap.token')
            )
        );
    }
}
