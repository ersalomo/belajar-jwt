<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Notification;

class NotificationMenu extends Component
{
    public function render()
    {
        $notifications = Notification::getNotifications(auth()->id());
        return view('livewire.notification-menu', [
            'notifications' => $notifications
        ]);
    }

    public function markAsRead(Notification $notification)
    {
        $notification->update([
            "status" => "read"
        ]);
    }
}
