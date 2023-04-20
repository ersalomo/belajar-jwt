<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Visitor extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected string $guard  = 'visitor';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


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
        'image_base64',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function password(): Attribute
    {
        return new Attribute(
            set: fn ($value) => bcrypt($value),
        );
    }

    protected function firstname() : Attribute {
        return new Attribute(
            get : fn($firstname) => $firstname. " ". $this->attributes['lastname'],
        );
    }

    protected function picture() : Attribute {
        return Attribute::make(
            get: fn($val) => $val ?
                '/storage/users/'.$val : '/storage/users/img.png',
        );
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'user_id');
    }
}
