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
        if ($this->mode == 'register') return view('livewire.auth.register');
        elseif ($this->mode == 'forget-password') return view('livewire.auth.forget-password');
        else return view('livewire.auth.login');
        // return view('livewire.auth');
    }
    public function loginHandler()
    {
        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'username' : 'email';
        $credentials = $this->validate();
        if (Guard::attempt($credentials, $this->remainMe)) {
            $user = User::where($fieldType, $credentials['email'])->first();
            if( (bool) $user["is_blocked"]) {
                auth()->logout();
                return redirect()->route('auth')->with('fail','your account has been blocked');
            }
            return $this->returnUrl === null ?
                to_route('home.home-user') :
                redirect()->to($this->returnUrl);
        }
        return redirect()->route('auth')->with('fail','This account does\'nt match to our records');
    }

    public function registerHandler()
    {
        dd('regis');
    }
}
