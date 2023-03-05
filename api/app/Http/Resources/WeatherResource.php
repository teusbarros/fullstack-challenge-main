<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'weather_id' => $this->weather_id,
            'main' => $this->main,
            'description' => $this->description,
            'temp' => $this->temp,
            'temp_min' => $this->temp_min,
            'temp_max' => $this->temp_max,
            'feels_like' => $this->feels_like,
            'pressure' => $this->pressure,
            'humidity' => $this->humidity,
            'visibility' => $this->visibility,
            'last_update' => $this->lastUpdate,
            'created_at' => $this->created_at,
        ];
    }
}
