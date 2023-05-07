<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\UserReq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataEmployeeController extends Controller
{
    public function index(Request $request) {
        $emp_role = 4;
        $employees = User::where('role_id' ,'!=', $emp_role)
            ->orderBy('created_at', 'desc')
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

        User::create($data);
        return to_route('admin.employee-table');
    }

}
