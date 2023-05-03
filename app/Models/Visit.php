<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visit extends Model
{
    use HasFactory;

    protected $table = "visits";
    protected $guarded = ['id'];
    protected $with = [
        "appointment"
    ];

    public function appointment(): BelongsTo {

        return $this->belongsTo(Appointment::class, 'id_appmt', 'id');
    }

}
