<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Appointment;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visit>
 */
class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $appointments = Appointment::get(['id']);
        return [
            'id_appmt' => $this->faker->randomElement($appointments),
            'visit_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'checkin' => $this->faker->numberBetween(0,1),
            'checkout' => $this->faker->numberBetween(1,0),
            'notes' => $this->faker->text,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
