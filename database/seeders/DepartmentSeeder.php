<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\KodeEmp;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,10) as $i) {
            Department::create([
                'department' => fake()->jobTitle(),
            ]);
        }
    }
}
