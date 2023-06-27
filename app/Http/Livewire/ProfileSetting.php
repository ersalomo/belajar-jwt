<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Livewire\Event;

class ProfileSetting extends Component
{
    public string $tab = 'profile';// default
    public string
        $name,
        $email,
        $gender,
        $phone,
        $nik,
        $fn,
        $ln,
        $username,
        $address,
        $company_name,
        $occupation,
        $password,
        $new_password,
        $confirm_new_password; //for password


    public function updatingTab($val)
    {
        $this->tab = $val;
        $user = auth()->user();
        if ($this->tab == 'contact') {
            $detail = $user->detail()->first();
            $this->nik = $detail['NIK'] ?? "";
            $this->address = $detail['address'] ?? "";
            $this->company_name = $detail['company_name'] ?? "";
            $this->occupation = $detail['occupation'] ?? "";
            $this->phone = $detail['phone'];
        }
        $this->resetValidation();
    }

    public function mount()
    {
        $user = auth()->user();
        if ($this->tab == 'profile') {
            $this->email = $user['email'];
            $this->username = $user["detail"]['username'];
            $this->name = $user['name'];
            $this->ln = $user['detail']?->ln ?? "";
            $this->gender = $user['gender'];
        }
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required',
            'ln' => 'required',
        ]);
        $user = auth()->user();
        $user->update([
            'name' => $this->name,
            'gender' => $this->gender
        ]);

        $user->detail()->update([
            'ln' => $this->ln
        ]);
        $this->showToaster('success', 'success updated');
    }

    public
    function showToaster(string $type, $message): Event
    {
        return $this->emit('alert:update', [
            'type' => $type,
            'message' => $message
        ]);
    }

    public
    function updateDetail()
    {
        $this->validate([
            'nik' => 'required|min:16|max:16|string',
            'address' => 'required|min:4|string',
            'company_name' => 'string',
            'occupation' => 'string',
        ], [
            'nik.numeric' => 'enter valid number'
        ]);

        auth()->user()->detail()->update([
            'nik' => $this->nik,
            'address' => $this->address,
            'company_name' => $this->company_name,
            'occupation' => $this->occupation,
        ]);
        return $this->showToaster('success', 'updated');
    }

    public
    function changePassword()
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
            return $this->showToaster('success', 'updated');
        }
        return $this->showToaster('error', 'updated');
    }


    public
    function render()
    {
        return view('livewire.profile-setting');
    }
}
