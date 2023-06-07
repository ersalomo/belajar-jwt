<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = User::where('role_id', 4)->limit(10)->get(['id']);
        foreach ($ids as $id) {
            Appointment::create([
                'visitor_id' => $id['id'],
                'name_emp' => fake()->name,
                'purpose' => fake()->sentence(),
                'visit_date' => fake()->dateTimeInInterval('+1 week'),
                'arrival_time' => fake('id_ID')->time(),
                'company_name' => fake()->company(),
                'number_plate' => fake()->randomNumber(4),
                'transportation' => fake()->word(),
                'visitation_type' => fake()->randomElement(['pribadi', 'private', 'business','dinas']),
                'status' => 'pending',
            ]);
        }
    }
}
