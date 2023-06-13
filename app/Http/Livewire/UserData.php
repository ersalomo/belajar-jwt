<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserData extends Component
{
    public function render()
    {

        return view('livewire.user-data', [
            'users' => User::whereNot('id', auth()->user()->id)
                ->latest()
                ->paginate(20),
        ]);
    }
    public function confirmDelete() {

    }

    public function delete(User $user) {
        if ($user->role_id != 4) {
            $user->emp_department()->delete();
        }
        $user->detail()->delete();
        $user->delete();
        return back();
    }
}
