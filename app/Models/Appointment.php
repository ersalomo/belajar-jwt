<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasOne;

class   Appointment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = [
        'visitor',
    ];

    public function visitor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'visitor_id')->where('role_id', 4);
    }

    public function visit(): HasOne {
        return $this->hasOne(Visit::class);
    }


    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($val) => Carbon::create($val)->format('Y-m-d'),
        );
    }
}
