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
        'email',
        'name',
        'password',
        'role_id',
        'gender',
        'is_blocked',
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
        'detail'
    ];

    protected function name(): Attribute
    {
        return new Attribute(
//            get: fn($firstname, $e) => $firstname . " " . $this->lastname
//        get: function ($fn,$user) {
//            if($user['role_id'] == 2) return "Karyawan" . " " . $this->lastname;
//            if($user['role_id'] == 3) return "Securiry" . " " . $this->lastname;
//            return $fn . " " . $this->lastname;
//            }
        );
    }

    protected function password(): Attribute
    {
        return new Attribute(
            set: fn($value) => bcrypt($value),
        );
    }

    public function visitor(): HasMany
    {
        return $this->hasMany(Appointment::class, 'visitor_id');
    }
    public function detail(): HasOne
    {
        return $this->hasOne(DetailUser::class);
    }
    public function isVisitor(): bool
    {
        $user = auth()->user();
        if ($user->role_id == 4) {
            $id_appt = auth()->user()->visitor()->first();
            $visitExits = null;
            if($id_appt){
                $visitExits = Visit::where('appointment_id', $id_appt['id'])->first();
            }
            return boolval($visitExits);
        }
        return false;
    }
}
