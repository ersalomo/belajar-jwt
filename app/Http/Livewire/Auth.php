<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Auth extends Component
{
    // public string $isModeLogin = true;
    public string $mode = 'login';

    public string $email, $password;
    public bool $remainMe = false;

    public $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];
    public $messages = [
        'email.email' => 'masukkan alamt email yang valid!',
        'password.required' => 'masukkan password!'
    ];
    public function mount()
    {
        $this->mode = request()->query('mode', 'login');
    }
    public function render()
    {
        if ($this->mode == 'login') {
            return view('livewire.auth.login');
        }
        return view('livewire.auth.register');
        // return view('livewire.auth');
    }
    public function loginHandler()
    {
        $credentials = $this->validate();
        if (auth('web')->attempt($credentials, $this->remainMe)) {
            // $this->reset();
            return to_route('home.home-user');
        }
        dd('salah');
    }
    public function registerHandler()
    {
        dd('regis');
    }
}
