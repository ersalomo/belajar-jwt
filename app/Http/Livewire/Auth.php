<?php

namespace App\Http\Livewire;

use App\Notify\NotifyHelper;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;
use App\Models\User;
use Illuminate\Support\Facades\Auth as Guard;

class Auth extends Component
{
    use NotifyHelper;
    // public string $isModeLogin = true;
    public string $mode = 'login';

    public string $email, $password;
    public bool $remainMe = false;
    public $returnUrl;
    public $login_id;
    public $name, $confirmation_password, $term_condition, $username, $phone, $gender;

    public function mount(): void
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
        $credentials = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Guard::attempt($credentials, $this->remainMe)) {
            $user = User::where($fieldType, $credentials['email'])->first();
            if ((bool)$user["is_blocked"]) {
                auth()->logout();
                return redirect()->route('auth')->with('fail', 'your account has been blocked');
            }
            $role_admin = 1;
            if ($user->role_id === $role_admin) {
                auth()->logout();
                return redirect()->route('auth')->with('fail', 'you not may encounter this page');
            }
            $this->successNotify("Login success");
            return $this->returnUrl === null ?
                to_route('home.home-user') :
                redirect()->to($this->returnUrl);
        }
        return redirect()->route('auth')->with('fail', 'This account does\'nt match to our records');
    }

    public function registerHandler()
    {
        $data = $this->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required|min:5|max:16',
            'phone' => 'required',
            'gender' => 'required|in:0,1',
            'term_condition' => 'required|boolean',
            'username' => 'required|min:5|max:10',
            'confirmation_password' => 'same:password'
        ]);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'password' => $data['password'],
        ])->detail()->create([
            'phone' => $data['phone'],
            'username' => $data['username'],
        ]);
        $user = [
            'email' => $data['email'],
            'password' => $data['password']
        ];
        if (Guard::attempt($user, $this->remainMe)) {
            $this->successNotify("register success 😊");
            return to_route('home.home-user');
        }
        $this->errorNotify("Something went wrong 😒");
        return back();
    }

}
