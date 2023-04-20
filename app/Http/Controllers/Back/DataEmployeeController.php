<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;
use App\DataTables\EmployeesDataTable;

class DataEmployeeController extends Controller
{
    public function index(EmployeesDataTable $dataTable) {
//        return view('back.content.data-employee', [
//            'employees' => Employee::paginate(20),
//        ]);
        return $dataTable->render('back.content.data-employee');
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
