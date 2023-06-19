<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileSetting extends Component
{
    public string $tab = 'profile';// default
    public string
        $name,
        $email,
        $gender,
        $phone,
        $fn,
        $ln = "",
        $username,
        $address,
        $company_name,
        $occupation,
        $password,
        $new_password,
        $confirm_new_password; //for password


    public function updatingTab($val)
    {
        $this->resetValidation();

    }
    public function mount(){
        $user = auth()->user();
        if ($this->tab == 'profile') {
            $this->name = $user['name'];
            $this->ln = $user['detail']?->ln ?? "";
        }elseif($this->tab == 'contact'){
            dd('');
        }
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required',
//    'email' => 'required',
            'ln' => 'required',
        ]);
        $user = auth()->user();
        $user->update([
            'name' => $this->name,
        ]);

        $user->detail()->update([
            'ln' => $this->ln
        ]);
    }

    public function updateDetail()
    {
    }

    public function changePassword()
    {
        $this->validate([
            'password' => ['required'],
            'new_password' => ['required', 'string'],
            'confirm_new_password' => ['required', 'same:new_password'],
        ], [
            'confirm_new_password.same' => 'Confirm this credentials'
        ]);
        $user = auth()->user();
        $new_password = $this->new_password;
        $validPassword = Hash::check($new_password, $user->password);
        if ($validPassword) {
            $user->update([
                'password' => $new_password
            ]);
            dd('updated');
        }
        session()->flash('error', ' password tidak sesuai');
    }


    public function render()
    {
        return view('livewire.profile-setting');
    }
}
