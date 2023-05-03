<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class DataEmployeeController extends Controller
{
    public function index(Request $request) {
        return view('back.content.data-employee', [
            'employees' => Employee::orderBy('created_at', 'desc')->paginate(20),
        ]);
    }

    public function create(Request $request) {
        return view('back.content.add-data.add-employee');
    }

    public function post(EmployeeRequest $request) {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $path = Storage::putFile('public/images/employee', $request->file('picture'));
            $data['picture'] = $path;
        }

        Employee::create($data);
        return to_route('admin.employee-table');
    }

}
