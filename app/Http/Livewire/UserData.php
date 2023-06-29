<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Notify\NotifyHelper;

class UserData extends Component
{
    use NotifyHelper;

    public
        $paginate = 20,
        $orderBy = "ASC",
        $role = "",
        $search = "";

    public function render()
    {

        return view('livewire.user-data', [
            'users' => User::whereNot('id', auth()->user()->id)
                ->latest()
                ->paginate(20),
        ]);
    }

    public function confirmDelete()
    {

    }

    public function delete(User $user)
    {
        try {
            if ($user->role_id != 4) {
                $user->emp_department()->delete();
                $user->visitation()->delete();
            } else {
                $user->appointment()->delete();

            }
            $user->detail()->delete();
            $user->delete();
            $this->successNotify("Data user deleted successfully :)");
//            return back()->with("warning", "Data user deleted successfully :)");
        } catch (\Exception $e) {
            $this->errorNotify("Cannot delete this user because integrity constrained");
        }
    }
}
