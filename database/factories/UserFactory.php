<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => fake()->email(),
            'name' => fake()->name,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => '$2y$10$v8Fg/gQrudWlEeYBaZvW2uG9Azp2AxD3YkH8niDztI6k9Mquw57Q2',
            'gender' => fake()->numberBetween(0,1),
            'role_id' => fake()->numberBetween(1,4),
        ];
    }
}
