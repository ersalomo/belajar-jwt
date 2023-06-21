<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    protected $with= [
        "conversation"
    ];

    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class, 'con_id');
//        $this->hasManyThrough(Notification::class, Conversation::class,);
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(get: fn($time) => \Carbon\Carbon::parse($time)->diffForHumans());
    }

    public static function getNotifyForAdmin()
    {
        return self::whereNull("con_id")->get();
    }

    public static function getNotifications($userId)
    {
        return Notification::whereHas('conversation', function ($query) use ($userId) {
            $query->where('user1', $userId)
                ->orWhere('user2', $userId);
        })->get();
    }
}
