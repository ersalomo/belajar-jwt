<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => fake()->numberBetween(100000,999999),
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake('id_ID')->phoneNumber(),
            'address' => fake()->address(),
            'email_verified_at' => now(),
            'password' => bcrypt(12345678),
            'role_id' => fake()->numberBetween(1,3),
            'department' => fake()->jobTitle(),
            'title' => fake()->jobTitle(),
            'remember_token' => Str::random(10),
        ];
    }
}
