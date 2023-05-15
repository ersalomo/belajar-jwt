<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User};
use App\Http\Requests\UserReq;
use Illuminate\Support\Facades\Storage;

class DataVisitorController extends Controller
{
    public function index(Request $request) {
        return view('back.content.data-visitor', [
            'visitors' => User::where('role_id',4)
                ->latest()
                ->paginate(20),
        ]);
    }

    public function create(Request $request) {
        return view('back.content.add-data.create-visitor');
    }

    public function store(UserReq $request) {
        $visitor = $request->all();
        if ($request->hasFile('picture')) {
            $path = Storage::putFile('public/images/employee', $request->file('picture'));
            $visitor['picture'] = $path;
        }
        User::create($visitor);
        return back()->with('success', 'Data berhasil ditambahkan');
    }
}
