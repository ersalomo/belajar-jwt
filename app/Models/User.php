<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'remember_token',
        'role_id'
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
        'is_blocked' => 'boolean'
    ];

    protected $with = [
        'department',
//        'appointmentEmp'
    ];

    protected function firstname(): Attribute
    {
        return new Attribute(
            get: fn($firstname, $e) => $firstname . " " . $this->lastname
        );
    }

    protected function picture(): Attribute
    {
        return Attribute::make(
            get: fn($val) => $val ? '/storage/users/' . $val : '/storage/users/img.png',
        );
    }

    protected function password(): Attribute
    {
        return new Attribute(
            set: fn($value) => bcrypt($value),
        );
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'kode_emp');
    }

    public function kodeEmp()
    {
        return $this->hasOne(KodeEmp::class, 'emp_id');
    }

    public function appointmentVisitor(): HasMany
    {
        return $this->hasMany(Appointment::class, 'visitor_id');
    }

    public function appointmentEmp(): HasOne
    {
        return $this->hasOne(Appointment::class, 'kode_emp');
    }

    public function isVisitor(): bool
    {
        $user = auth()->user();
        if ($user->role_id == 4) {
            $id_appt = auth()->user()->appointmentVisitor()->first()["id"];
            $visitExits = Visit::where('id_appmt', $id_appt)->first();
            return boolval($visitExits);
        }
        return false;
    }
}
