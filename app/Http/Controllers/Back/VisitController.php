<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Requests\VisitRequest;
use Illuminate\Support\Facades\Validator;

class VisitController extends Controller
{
    public function index(Request $request)
    {
        $visitations = Visit::all();
//        dd($visitations);

        return view('back.content.visitaion', [
            'visitations' => $visitations
        ]);
    }

    public function create(Request $request)
    {

    }

    public function store(VisitRequest $request)
    {
        $validator = Validator::make(
            $request->all(),
            $request->rules(),
            $request->messages()
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'errors' => $validator->errors()->toArray()
            ]);
        } else {
            $visit = Visit::create($request->all());

            if ($visit) {
                return response()->json([
                    'status' => 'success',
                    'visit' => $visit
                ], 201);
            }
            return response()->json([
                'status' => 'fail',
                'msg' => 'There something went wrong'
            ], 500);

        }
    }

    public function checkin(Request $request, $visitor_id) {
        $data = $request->validate([
            'checkin' => 'required',
        ]);
        Visit::update([
            'checkin' => $data['checkin'],
        ]);
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function checkout(Request $request, $visitor_id) {
        $data = $request->validate([
            'checkout' => 'required',
            'notes' => 'nullable|string',
        ]);
        Visit::update([
            'checkout' => $data['checkout'],
            'notes' => $data['notes'],
        ]);
        return response()->json([
            'status' => 'success',
        ]);
    }


    public function update(Request $request)
    {

    }

    public function listVisitationVisitors(Request $request){
        $visitations = Visit::get();
        return view(
            'front.home.list-visitation', [
                  'visitations' => $visitations
            ]
        );
    }

}
