<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeatherResource;
use App\Models\User;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function show(User $user)
    {
       return WeatherResource::collection([$user->latestWeather]);
    }
}
