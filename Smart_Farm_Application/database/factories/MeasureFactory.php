<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Measure>
 */
class MeasureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "timestamp" => fake()->dateTimeInInterval('now', '+1 days', 'Europe/San_Marino'),
            "temperatura" => fake()->randomFloat(2, 15.00, 24.00),
            "umidita" => fake()->randomFloat(2, 50.00, 70.00),
            "co2" => fake()->numberBetween(800, 1200),
            "irrigazione" => fake()->numberBetween(150, 250),
            "luminosita" => fake()->numberBetween(20000, 50000)
        ];
    }
}
