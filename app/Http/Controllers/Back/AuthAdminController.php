<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Notify\NotifyHelper;
use Illuminate\Http\Request;
use App\Models\Employee;

class AuthAdminController extends Controller
{
    use NotifyHelper;

    public function index(Request $request)
    {
//        $this->notyf()->addInfo("Welcome login with your credential");
        return view('back.auth.login');
    }

    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($credential, $request->rememberMe)) {
            if ((boolean)auth()->user()->is_blocked) {
                auth()->logout();
                return to_route('admin-auth.index')->with('error', 'your account has been blocked!');
            }
            $id_role_admin = 1;
            if (auth()->user()["role_id"] != $id_role_admin) {
                return to_route('admin-auth.index')->with('error', 'Only admin can access this page!');
            }
            $this->notyf()->addSuccess("Login success");
            return to_route('admin.dashboard');
        }
        return redirect()->back()->with('error', 'this credentials does\'nt exists');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        auth('employee')->logout();
        $this->notyf()->addSuccess("Logout success");
        return to_route('admin-auth.index');
    }
}
