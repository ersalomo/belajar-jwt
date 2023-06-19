<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = [
        'con_id',
        'title',
        'status',
        'body',
    ];
    protected  function createdAt():Attribute {
        return Attribute::make(get: fn($time) => \Carbon\Carbon::parse($time)->diffForHumans());
    }

}
