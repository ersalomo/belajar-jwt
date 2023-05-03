<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected string $guard  = 'employee';

    protected $fillable = [
            'firstname',
            'lastname',
            'username',
            'email',
            'phone',
            'address',
            'picture',
            'password',
            'is_blocked',
            'department',
            'title',
        ];
    protected $casts = [
        'is_blocked' => 'boolean'
    ];

    protected function firstname() : Attribute {
        return new Attribute(
            get : fn($firstname) => $firstname. " ". $this->lastname
        );
    }
    protected function picture() : Attribute {
        return new Attribute(
            get: fn ($val) => $val ? '/storage/users/'. $val         : '/storage/users/img.png',

        );
    }
    protected function password() : Attribute {
        return new Attribute(
            set: fn ($val) => bcrypt($val)
        );
    }
    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'kode_emp');
    }
}
