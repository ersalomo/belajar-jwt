<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EmpDepartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'department_id',
        'kode_emp',
        'title',
    ];

    public function department():HasOne {
        return $this->hasOne(Department::class ,'department_id');
    }
}
