<?php

namespace Database\Seeders;

use App\Models\KodeEmp;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KodeEmpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emp_ids = User::where('role_id', '!=', 4 )->get(['id']);
        foreach ($emp_ids as $id) {
            KodeEmp::create([
                'emp_id' => $id['id'],
                'kode_emp' => Str::random(10)
            ]);
        }
    }
}
