<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class WeatherController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');
    }
}
