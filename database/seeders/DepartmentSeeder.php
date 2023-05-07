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
        $emp_ids = User::where('role_id', '!=', 4)->get(['id']);
        foreach ($emp_ids as $id) {
            Department::create([
                'kode_emp' => $id['id'],
                'department' => fake()->jobTitle(),
                'title' => fake()->company()
            ]);
        }
    }
}
