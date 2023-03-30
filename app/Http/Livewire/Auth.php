<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Visitor;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth as Guard;
class Auth extends Component
{
    // public string $isModeLogin = true;
    public string $mode = 'login';

    public string $email, $password;
    public bool $remainMe = false;
    public $returnUrl;
    public $login_id;

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
        $this->returnUrl = request()->returnUrl;
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
        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = $this->validate();
        if (auth('visitor')->attempt($credentials, $this->remainMe)) {
            return to_route('home.home-user');
            $user = Visitor::where('email', $credentials['email'])->first();
            $this->nextReturn($user);
            dd("salahv", $credentials['password']);
        }
        if(auth('employee')->attempt($credentials, $this->remainMe)) {
            return to_route('home.home-user');
            $user = Employee::where('email', $credentials['email'])->first();
            $this->nextReturn($user);
            dd("salahe", $credentials['password']);
        }
    }
    private  function nextReturn($user) {
//        $this->reset();
        if($user->is_blocked) {
            auth()->logout();
            return redirect()->route('auth')->with('fail','your account has been blocked');
        }
        if($this->returnUrl !== null) return redirect()->to($this->returnUrl);
        return to_route('home.home-user');
        dd('masuk 2');
        }
    public function registerHandler()
    {
        dd('regis');
    }
}
