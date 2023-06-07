<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DetailUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = User::get('id');
        foreach ($ids as $id) {
            \App\Models\DetailUser::create([
            'user_id' => $id['id'],
            'fn' => fake()->firstName(),
            'ln' => fake()->lastName(),
            'nik' => fake()->creditCardNumber(),
            'username' => fake()->userName(),
            'picture' => '',
            'phone' => fake('id_ID')->phoneNumber(),
            'address' => fake()->address(),
            'company_name' => fake()->company(),
            'occupation' => fake()->jobTitle(),
            ]);
        }
    }
}
