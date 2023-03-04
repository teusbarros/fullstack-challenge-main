<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response()->json([
        'message' => 'all systems are a go',
        'users' => \App\Models\User::all(),
    ]);
});

Route::get('/weather/{user_id}', function ($user_id) {
    $user = \App\Models\User::find($user_id);
    return response()->json([
        'message' => 'all systems are a go',
        'user' => $user,
        'weather' => $user->latestWeather,
    ]);
});
