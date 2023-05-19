<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class HandleNotif implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user;
    private int $idTargetUser;
    public function __construct($user, $idTargetUser)
    {
        $this->user = $user;
        $this->idTargetUser = $idTargetUser;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn(): Channel | array
    {
        return new PrivateChannel('handle-notif-' . $this->idTargetUser);
    }
     public function broadcastAs() : string {return 'handle.notif';}

     public function broadcastWith():array {
        return [
            'data' => $this->user,
        ];
     }
}
