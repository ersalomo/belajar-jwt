<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetailUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'fn',
        'ln',
        'NIK',
        'username',
        'picture',
        'phone',
        'address',
        'company_name',
        'occupation',
    ];
    protected function picture(): Attribute
    {
        return Attribute::make(
            get: fn($val) => $val ? '/storage/users/' . $val : '/storage/users/img.png',
        );
    }
    public function user(): HasOne {
        return $this->hasOne(User::class, 'user_id');
    }
}
