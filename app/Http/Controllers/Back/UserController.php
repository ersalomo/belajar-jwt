<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserReq;
use App\Models\Department;
use App\Models\User;
use App\Notify\NotifyHelper;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UserController extends Controller
{
    use NotifyHelper;
    private UserServiceInterface $service;

    public function __construct(
        UserServiceInterface $userService
    ) {
        $this->service = $userService;
    }


    public function index(Request $request)
    {
        return view('back.content.user.index');
    }

    public function createAndEdit(Request $request)
    {
        if ($id = $request->query('user')) {
            $user = $this->service->getUserById($id);
        } else {
            $user = [];
        }
        $departments = Department::all();
        return view('back.content.user.create', compact('departments', 'user'));
    }

    public function store(UserReq $request)
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $path = Storage::putFile('public/images/employee', $request->file('picture'));
            $data['picture'] = $path;
        }

        $user = $this->service->create([
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
        $this->successNotify("New data user created :)");
        return to_route('admin.user.index');

    }

    public function update(UserReq $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('picture')) {
            $path = Storage::putFile('public/images/employee', $request->file('picture'));
            $data['picture'] = $path;
        }
        $user = $this->service->getUserById($id);
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
