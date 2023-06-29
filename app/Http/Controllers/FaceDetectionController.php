<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ImageIdentification, User, Visit, Visitor, Appointment};

class FaceDetectionController extends Controller
{

    public function __construct() {

    }
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
        $data = $request->only([
            "image_size",
            "image_base64",
            "image_descriptor"
        ]);
        $data["image_name"] = "Visitor-Face-screening-" . $user["id"] . "-" . time();
        try {
            ImageIdentification::updateOrCreate([
                "visitor_id" => $user["id"]
            ], $data);

            return response()->json([
                "status" => "success",
                "message" => "Image success added successfully"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "fail",
                "message" => "something went wrong!"
            ], 500);
        }
    }
    public function getImagesDesc() {
        $images = ImageIdentification::get(["visitor_id","image_name", "image_descriptor"]);

        return response()->json([
            'status' => "success",
            "code" => 200,
            "data" => $images
        ]);

    }

    public function faceRecog()
    {
        return view('front.home.face-recog.face-recognation');
    }
}
