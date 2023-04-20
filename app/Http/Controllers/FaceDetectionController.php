<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class FaceDetectionController extends Controller
{
    public function index(){
        return view('face-detection');
    }
    public function store(Request $request) {

    }

    public function labeledFaces(Request $request){
        $visitors = Visitor::get(['picture']);
        return response()->json([
            'visitors' => $visitors
        ]);
    }
}
