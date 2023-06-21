<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    use HasFactory;

    protected $table = 'conversations';
    protected $fillable = [
        'user1',
        'user2',
    ];

    public static function createConversation($userOne, $userTwo): self
    {
        $conv = self::where(function ($query) use ($userOne, $userTwo) {
            $query->where('user1', $userOne)->where('user2', $userTwo);
        })->orWhere(function ($query) use ($userOne, $userTwo) {
            $query->where('user1', $userTwo)->where('user2', $userOne);
        })->first();
        if (!$conv) {
            $newConv = new Conversation([
                "user1" => $userOne,
                "user2" => $userTwo
            ]);

            $newConv->save();
            return $newConv;
        }
        return $conv;
    }

    public function notification():HasMany {
        return $this->hasMany(Notification::class, 'con_id');
    }
}
