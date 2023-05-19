<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class   Appointment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = [
      'employee',
      'visitor',
        'visit'
    ];

    public function employee() {
        return $this->belongsTo(User::class, 'kode_emp');
    }

    public function visitor() {
        return $this->belongsTo(User::class, 'visitor_id');
    }
    public function visit(): BelongsTo
    {
        return $this->belongsTo(Visit::class, 'id_appmt');
    }
    protected function createdAt(): Attribute {
        return Attribute::make(
            get: fn($val) => Carbon::create($val)->diffForHumans(),
        );
    }
}
