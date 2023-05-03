<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Visit, Visitor, Appointment};

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
    public function faceVerify(Request $request) {
        $id = $request->get('id_visit');
        $data = Visit::find($id);
        return view('face-recognation.visitor-verified',[
            'data' => $data
        ]);
    }
}
