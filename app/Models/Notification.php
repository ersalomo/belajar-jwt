<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender',
        'receiver',
        'title',
        'status',
        'body',
    ];


    public function sender() {}
    public function receiver() {}
}
