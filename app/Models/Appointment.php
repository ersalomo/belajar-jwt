<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class   Appointment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = [
      'employee',
      'visitor'
    ];

    public function employee() {
        return $this->belongsTo(User::class, 'kode_emp');
    }

    public function visitor() {
        return $this->belongsTo(User::class, 'visitor_id');
    }
    public function visit(): HasMany
    {
        return $this->hasMany(Visit::class, 'id_appmt');
    }
}
