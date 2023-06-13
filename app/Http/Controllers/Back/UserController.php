<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserReq;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        return view('back.content.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAndEdit(Request $request)
    {
        if ($id = $request->query('user')) {
            $user = User::find($id);
        } else {
            $user = [];
        }
        $departments = Department::all();
        return view('back.content.user.create', compact('departments', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserReq $request)
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $path = Storage::putFile('public/images/employee', $request->file('picture'));
            $data['picture'] = $path;
        }
        $user = User::create([
            'email' => $data['email'],
            'name' => $data['firstname'],
            'password' => $data['password'],
            'gender' => $data['gender'] || 1,
            'role_id' => $data['role_id'],
        ]);
        if ($user->role_id != 4) {
            $user->emp_department()->create([
                'emp_id' => $user['id'],
                'department_id' => $data['department_id'],
                'kode_emp' => \Str::random(10),
                'title' => $data['title'],
            ]);

        }

        $user->detail()->create([
            'fn' => $data['firstname'],
            'ln' => $data['lastname'],
            'NIK' => '',
            'username' => $data['firstname'] . $user['id'],
//            'picture' => $data['picture'] || null,
            'phone' => $data['phone'],
            'address' => $data['address'],
            'company_name' => '',
            'occupation' => '',
        ]);
        return to_route('admin.user.index')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserReq $request, User $user)
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $path = Storage::putFile('public/images/employee', $request->file('picture'));
            $data['picture'] = $path;
        }
        $user->update([
            'email' => $data['email'],
            'name' => $data['firstname'],
//            'password' => $data['password'],
            'gender' => $data['gender'] || 1,
            'role_id' => $data['role_id'],
        ]);
        if ($data['role_id'] != 4) {
            $request->validate([
                'title' => 'string',
                'department_id' => 'required|exists:departments,id'
            ]);
            $user->emp_department()->update([
//                'emp_id' => $user['id'],
                'department_id' => $data['department_id'],
                'kode_emp' => $user->emp_department['kode_emp'],
                'title' => $data['title'],
            ]);

        }
        $user->detail()->update([
            'fn' => $data['firstname'],
            'ln' => $data['lastname'],
            'NIK' => '',
            'username' => $data['username'] . $user['id'],
//            'picture' => $data['picture'] || null,
            'phone' => $data['phone'],
            'address' => $data['address'],
            'company_name' => '',
            'occupation' => '',
        ]);
        return to_route('admin.user.index')->with('success', 'Data berhasil diupdate');
    }

    public function getAllEmployees(Request $request)
    {
        $role_id = 2;
        $getByCol = ['id', 'name', 'role_id'];
        if ($request->has('q')) {
            $employees = User::where("name", "like", "%{$request->q}%")
                ->where("role_id", $role_id)
                ->orderBy("name")
                ->limit(5)
                ->get($getByCol);
        } else {
            $employees = User::where('role_id', $role_id)
                ->orderBy('name', 'ASC')
                ->limit(5)
                ->get($getByCol);
        }
        return response()->json($employees);
    }
}
