<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class AuthAdminController extends Controller
{
    public function index(Request $request) {
        return view('back.auth.login');
    }

    public function login(Request $request){
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth('employee')->attempt($credential, $request->rememberMe))
            if((boolean)auth('employee')->user()->is_blocked) {
                auth('employee')->logout();
                return to_route('admin-auth.index')->with('error', 'your account has been blocked!');
            }
            return to_route('admin.dashboard');

    }

    public function logout(Request $request) {
        $request->session()->flush();
        auth('employee')->logout();
        return to_route('admin-auth.index');
    }
}
