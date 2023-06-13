<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Department
};
use Illuminate\Support\Facades\Validator;

class DapartmentController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::all();
        return view('back.content.department.index', [
            'departments' => $departments
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->only([
            'department'
        ]), [
                'department' => 'required'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'errors' => $validator->errors()->toArray()
            ], 422);
        }
        Department::create($validator->validate());
        return response()->json([
            'status' => 'fail',
            'msg' => 'created success'
        ], 201);

    }
}
