<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{KodeEmp, User, Visit, Visitor, Employee};
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run():void
    {
                 User::create([
                 'name' => fake()->name(),
                 'email' => 'admin@gmail.com',
                 'password' => bcrypt('12345678'),
                 'role_id' => 1,
                 'gender' => fake()->numberBetween(1,0),
                 'email_verified_at' => now(),
                 'remember_token' => Str::random(10),
             ]);

         User::factory(90)->create();
         $this->call([
             DetailUser::class,
             AppointmentSeeder::class,
             DepartmentSeeder::class,
             EmployeeDepartmentSeeder::class
         ]); // for seeder

    }
}
