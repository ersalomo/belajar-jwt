<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\Notification;
use App\Models\Visit;
use Livewire\Component;
use Livewire\Event;

class ApprovalVisitor extends Component
{
    public $listeners = [
        'approveCheckout'
    ];

    public function render()
    {
        $user = auth()->user();
        if ($user["role_id"] != 4) { // for emp
            $visitations = $user->visitation()->get();
        } else { // for visitor
            $ids = $user->appointment()->pluck("id");
            $visitations = Visit::whereIn("appointment_id",$ids)->get();
        }
        return view('livewire.approval-visitor', compact('visitations'));
    }

    public function openModalApprove($id): Event
    {
        $visit = Visit::findOrFail($id);
        if ($visit->notes == '') {
            return $this->emit('notifyNotFillTheNotes', []);
        }
        return $this->emit('openModalApprove', [
            'id' => $id
        ]);
    }

    public function approveCheckout($idVisit): Event
    {
        // cek user to fill notes immediately
        $visit = Visit::findOrFail($idVisit);
        $appointment = $visit->appointment()->latest()->first();
        $emp = auth()->user();
        if (!$visit->checkout) {
            $conv = Conversation::createConversation($appointment->visitor_id);
            Notification::create([
                'con_id' => $conv["id"],
                'title' => 'Visitor Checkout',
                'status' => 'unread',
                'body' => "$emp->name has checked out your visitation"
            ]);
            $visit->update([
                'checkout' => true,
                'checkout_at' => now()->format("H:i:s"),
            ]);
        }

        return $this->emit('approvedCloseModel', []);
    }
}
