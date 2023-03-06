<?php

namespace App\Jobs;

use App\Models\Weather;
use RuntimeException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class MakeApiRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user_id;
    public $latitude;
    public $longitude;
    public $units;
    public $appid;
    public $api_url;
    /**
     * Create a new job instance.
     */
    public function __construct($user_id, $latitude, $longitude, $units = 'imperial')
    {
        $this->user_id = $user_id;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->units = $units;
        $this->appid = config('app.weather.api_key');
        $this->api_url = config('app.weather.api_url');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $response = Http::get($this->api_url, [
            'lat' => $this->latitude,
            'lon' => $this->longitude,
            'units' => $this->units,
            'appid' => $this->appid,
        ]);

        if ($response->failed()) {

            now()->addSeconds(60 * $this->attempts());

            throw new RuntimeException("Failed to connect ", $response->status());
        }else{

            $weather =  [
                'user_id' => $this->user_id,
                'weather_id' => $response['weather'][0]['id'],
                'main' => $response['weather'][0]['main'],
                'description' => $response['weather'][0]['description'],
                'temp' => $response['main']['temp'],
                'temp_min' => $response['main']['temp_min'],
                'temp_max' => $response['main']['temp_max'],
                'feels_like' => $response['main']['feels_like'],
                'pressure' => $response['main']['pressure'],
                'humidity' => $response['main']['humidity'],
                'visibility' => $response['visibility'],
            ];
            Weather::create($weather);
        }

    }
}
