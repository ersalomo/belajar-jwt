<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator, Hash};

class UserController extends Controller
{
    public function index()
    {
    }
    public function changePassword(Request $req)
    {
        $data = $req->validate([
            'password' => ['required'],
            'new_password' => ['required', 'string'],
            'confirm_new_password' => ['required', 'same:new_password'],
        ], [
            'confirm_new_password.same' => 'Confirm this credentials'
        ]);
        $user = auth()->user();
        $new_password = $data['new_password'];
        $validPassword = Hash::check($new_password, $user->password);
        if ($validPassword) {
            $user = $user->update([
                'password' => $new_password
            ]);
            if ($user) {
                dd('updated');
            }
            dd('not updated');
        }
        session()->flash('error', ' password tidak sesuai');
    }
}
