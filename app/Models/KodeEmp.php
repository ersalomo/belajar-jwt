<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KodeEmp extends Model
{
    use HasFactory;
    protected $table = 'kode_emps';
    protected $guarded = ['id'];

    public function employee() : HasOne {
        return $this->hasOne(User::class, 'id')->where('role_id' ,'!=', 4);
    }
}
