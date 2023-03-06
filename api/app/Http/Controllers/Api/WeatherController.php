<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeatherResource;
use App\Jobs\MakeApiRequest;
use App\Models\User;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function show(User $user)
    {
        MakeApiRequest::dispatch($user->id, $user->latitude, $user->longitude);
        return WeatherResource::collection([$user->latestWeather]);
    }
}
