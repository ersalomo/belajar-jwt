<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Requests\VisitRequest;
use Illuminate\Support\Facades\Validator;

class VisitController extends Controller
{
    public function index(Request $request)
    {
        $visitations = Visit::all();
        return view('back.content.visitation', [
            'visitations' => $visitations
        ]);
    }

    public function create(Request $request)
    {

    }

    public function createVisitation(Request $request)
    {
        if ($id = $request->query('id')) {
            $appointment = Appointment::find($id);
        } else {
            return back();
//            $appointment = [];
        }
        return view('back.content.visitation.create', compact('appointment'));
    }

    public function storeVisitation(Request $request)
    {
        if (!$id = $request->id_ap) {
            return back()->with('missing', 'appointment not found!');
        }

        $data = $request->validate([
            'emp_id' => 'required|exists:users,id',
            'visit_date' => 'nullable'
        ], [
            'emp_id.required' => 'harus diisi',
            'emp_id.exists' => 'Karyawan tidak ditemukan',
        ]);

        $visit = Visit::create([
            'appointment_id' => $id,
            'emp_id' => $data['emp_id'],
            'visit_date' => $data['visit_date'],
            'checkin' => false,
            'checkout' => false,
            'notes' => '',
        ]);
        if ($visit) {
            Appointment::find($id)->update([
                'status' => 'approved'
            ]);
            return back()->with('success', 'created');
        }else{
        return back()->with('fail', 'fail');
        }

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

    public function checkin(Request $request, $idAppointment)
    { // today
        $data = $request->validate([
            'checkin' => 'required',
        ]);
        $visitation = Visit::where('id_appmt', $idAppointment)->first();

        $visitation->update(['checkin' => $data['checkin']]);

        return response()->json([
            'status' => 'success',
            'data' => $visitation
        ]);
    }

    public function checkout(Request $request, $idAppointment)
    {
        $data = $request->validate([
            'checkout' => 'required',
            'notes' => 'nullable|string',
        ]);

        $visitation = Visit::where('id_appmt', $idAppointment)->first();
        $visitation->update([
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

    public function listVisitationVisitors(Request $request)
    {
        $visitations = Visit::where('id_appmt', '!=', null)->get();
        return view(
            'front.home.visitation.list-visitation', [
                'visitations' => $visitations
            ]
        );
    }

    public function detailVisitorVisitation(Request $request)
    {
        $id_appointment_visitor = $request->query('id');
        $visitor = Visit::where('id_appmt', $id_appointment_visitor)->first();
        if (!$visitor) return back();
        return view('front.home.visitation.detail-visitation-visitor', [
            'visitor' => $visitor
        ]);
    }

    public function visitationOverview()
    {
        $count_each_visitors_by_mount = Visit::all()->count();
        return response()->json([
            'status' => 'success',
            'data' => $count_each_visitors_by_mount
        ]);
    }
}
