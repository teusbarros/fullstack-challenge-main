<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Weather>
 */
class WeatherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->unique()->numberBetween(1,20),
            'weather_id' => fake()->randomDigit(),
            'main' => fake()->text(5),
            'description' => fake()->text(30),
            'temp' => fake()->randomFloat(2, -15, 40),
            'temp_min' => fake()->randomFloat(2, -15, 40),
            'temp_max' => fake()->randomFloat(2, -15, 40),
            'feels_like' => fake()->randomFloat(2, -15, 40),
            'pressure' => fake()->randomNumber(2, true),
            'humidity' => fake()->randomNumber(2, true),
            'visibility' => fake()->randomNumber(2, true),
        ];
    }
}
