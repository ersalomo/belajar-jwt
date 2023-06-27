<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Visit, Visitor, Appointment};

class FaceDetectionController extends Controller
{
    public function index()
    {
        return view('face-detection');
    }

    public function viewFaceScreening()
    {
        return view('front.home.face-recog.view-face-screening');
    }

    public function faceScreening(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            "image_size" => "nullable",
            "image_name" => "nullable",
            "image_base64" => "nullable",
            "image_descriptor" => "string|nullable"
        ]);
        try {
            $user->image_id()->updateOrCreate([
                "image_size" => $request->image_size,
                "image_name" => $request->image_name,
                "image_base64" => $request->image_base64,
                "image_descriptor" => $request->image_descriptor,
            ]);
            return response()->json([
                "status" => "success",
                "message" => "Image success added successfully"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "fail",
                "message" => "Something went wrong 🤔"
            ], 500);
        }
    }

    public function faceRecog()
    {
        return view('front.home.face-recog.face-recognation');
    }
}
