<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WebGis>
 */
class WebGisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1, 2),
            'longitude' => fake('id_ID')->longitude(105, 107),
            'latitude' => fake('id_ID')->latitude(-7, -5),
            'created_at' => fake('id_ID')->dateTime(),
            'updated_at' => fake('id_ID')->dateTime()
        ];
    }
}
