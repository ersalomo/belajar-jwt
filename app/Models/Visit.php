<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visit extends Model
{
    use HasFactory;

    protected $table = "visitations";
    protected $guarded = ['id'];

    protected $with = [
        "appointment",

    ];
    protected $casts = [
      'checkout' => 'boolean',
      'checkin' => 'boolean'
    ];

    // seharusnya relasi 1:1 karena tidak bisa 2 appointment dalam satu kunjungan
    public function appointment(): BelongsTo {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
    protected function employee():BelongsTo {
        return $this->belongsTo(User::class, 'emp_id');

    }

}
