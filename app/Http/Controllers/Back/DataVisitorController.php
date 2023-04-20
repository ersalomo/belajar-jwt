<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;

class DataVisitorController extends Controller
{
    public function index(Request $request) {
        return view('back.content.data-visitor', [
            'visitors' => Visitor::paginate(20),
        ]);
    }

    public function create(Request $request) {
        return view('back.content.add-data.create-visitor');
    }

    public function post(Request $request) {
    }
}
