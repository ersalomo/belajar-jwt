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
        return view('livewire.approval-visitor', [
            'visitations' => Visit::all()
        ]);
    }

    public function openModalApprove($id): Event
    {
        return $this->emit('openModalApprove', [
            'id' => $id
        ]);
    }

    public function approveCheckout($idVisit): Event
    {
        // cek user mengisi notes terlbih dahulu
        $visit = Visit::findOrFail($idVisit);
        if (! $visit->checkout) {
            $visit->update([
                'checkout' => 1
            ]);
        }
        return $this->emit('approvedCloseModel', []);
    }
}
