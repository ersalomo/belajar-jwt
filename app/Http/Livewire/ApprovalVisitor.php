<?php

namespace App\Http\Livewire;

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
        if ($user->role_id == 2) { // for emp and visitor
            $visitations = $user->visitation()->get();
        } else { // for security
            $visitations = Visit::get();
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
        // cek user mengisi notes terlbih dahulu
        $visit = Visit::findOrFail($idVisit);

        if (!$visit->checkout) {
            $visit->update([
                'checkout' => 1
            ]);
        }

        return $this->emit('approvedCloseModel', []);
    }
}
