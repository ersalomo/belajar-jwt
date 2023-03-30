<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class   Appointment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = [
      'employee',
      'visitor'
    ];

    public function employee() {
        return $this->belongsTo(Employee::class, 'kode_emp');
    }

    public function visitor() {
        return $this->belongsTo(Visitor::class, 'user_id');
    }
}
