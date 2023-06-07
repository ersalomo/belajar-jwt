<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = \App\Models\User::where('role_id', '!=', 4)->get(['id']);
        $department_ids = Department::all(['id']);
        foreach ($ids as $id) {
            \App\Models\EmpDepartment::create([
                'emp_id' => $id['id'],
                'department_id' => fake()->randomElement($department_ids)['id'],
                'kode_emp' => fake()->creditCardNumber(),
                'title' => fake()->jobTitle()
            ]);
        }
    }
}
