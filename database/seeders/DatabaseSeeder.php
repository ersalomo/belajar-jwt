<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{User, Visit, Visitor, Employee};
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         User::factory(10)->create();
//         User::create([
//                 'name' => fake()->name(),
//                 'username' => fake()->userName(),
//                 'email' => 'ersalomo@gmail.com',
//                 'email_verified_at' => now(),
//                 'password' => bcrypt(12345678),
//                 'role_id' => 1,
//                 'remember_token' => Str::random(10),
//             ]);
//         Visitor::factory(100)->create();
//         Employee::factory(100)->create();
        Visit::factory(30)->create();
//         Employee::create([
//             'firstname' => "Ersalomo",
//             'lastname' => "Sitors",
//             'username' => fake()->userName(),
//             'email' => 'admin@gmail.com',
//             'phone' => fake('id_ID')->phoneNumber(),
//             'address' => fake()->address(),
//             'email_verified_at' => now(),
//             'password' => '$2y$10$v8Fg/gQrudWlEeYBaZvW2uG9Azp2AxD3YkH8niDztI6k9Mquw57Q2', //12345678
//             'role_id' => 1,
//             'department' => fake()->jobTitle(),
//             'title' => fake()->jobTitle(),
//             'remember_token' => Str::random(10),
//             ]);
//         Visitor::create([
//             'firstname' => "Ersalomo",
//             'lastname' => "Sitors",
//             'username' => fake()->userName(),
//             'email' => 'user@gmail.com',
//             'phone' => fake('id_ID')->phoneNumber(),
//             'address' => fake()->address(),
//             'email_verified_at' => now(),
//             'password' => '$2y$10$v8Fg/gQrudWlEeYBaZvW2uG9Azp2AxD3YkH8niDztI6k9Mquw57Q2', //12345678
//             'remember_token' => Str::random(10),
//             ]);
        // $this->call([
        //     \App\Models\WebGis::class
        // ]); // for seeder

    }
}
