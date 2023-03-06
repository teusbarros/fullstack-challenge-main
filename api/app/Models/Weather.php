<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Weather extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'weather_id',
        'main',
        'description',
        'temp',
        'temp_min',
        'temp_max',
        'feels_like',
        'pressure',
        'humidity',
        'visibility'
    ];
    protected $casts = [
        'temp_min' => 'integer',
        'temp_max' => 'integer',
        'temp' => 'integer',
        'feels_like' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    protected function lastUpdate(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Carbon::now()->diffInRealMinutes($this->created_at) . " minutes ago",
        );
    }
}
