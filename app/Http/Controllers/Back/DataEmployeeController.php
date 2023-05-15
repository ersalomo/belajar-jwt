<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserReq;
use App\Models\{
    User,
    Department,
    KodeEmp
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataEmployeeController extends Controller
{
    public function index(Request $request) {
        $visitor_role = 4;
        $employees = User::whereNot('role_id' , $visitor_role)
            ->latest()
            ->paginate(20);
        return view('back.content.data-employee', [
            'employees' => $employees
        ]);
    }

    public function create(Request $request) {
        return view('back.content.add-data.add-employee');
    }

    public function post(UserReq $request) {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $path = Storage::putFile('public/images/employee', $request->file('picture'));
            $data['picture'] = $path;
        }
        $user  = User::create($data);
        if ( $user->role_id != 4) {
            $user->department()->create([
                'department' => \Str::random(15),
                'title' => \Str::random(10)
            ]);
            $user->kodeEmp()->create([
                'kode_emp' => \Str::random(10)
            ]);
        }
        return to_route('admin.employee-table')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function delete(User $user) {
        if ($user->role_id != 4) {
            $user->department()->delete();
            $user->kodeEmp()->delete();
        }
      $user->delete();
      return back();
    }
}
