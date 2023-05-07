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
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake('id_ID')->phoneNumber(),
            'address' => fake()->address(),
            'email_verified_at' => now(),
            'password' => '$2y$10$v8Fg/gQrudWlEeYBaZvW2uG9Azp2AxD3YkH8niDztI6k9Mquw57Q2',
            'role_id' => fake()->numberBetween(1,4),
            'gender' => fake()->randomElement([1,0]),
            'remember_token' => Str::random(10),
        ];
    }
}
