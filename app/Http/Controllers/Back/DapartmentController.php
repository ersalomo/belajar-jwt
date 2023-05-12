<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Department
};

class DapartmentController extends Controller
{
    public function index(Request $request) {
        $departments = Department::all();
         return view('back.content.department.index' , [
             'departments' =>$departments
         ]);
    }
}
