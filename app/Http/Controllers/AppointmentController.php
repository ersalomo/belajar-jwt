<?php

namespace App\Http\Controllers;

use App\Models\{Appointment, Conversation, KodeEmp, Notification, User, Visitor, Visit};
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\{
    StoreAppointmentRequest,
    UpdateAppointmentRequest
};
use App\Events\{HandleNotif, ServerCreated, AppointmentCreated};
use App\Traits\Helper;

class AppointmentController extends Controller
{
    use Helper;

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('front.home.appointment.list-appointment');
    }

    public function getAppointmentsCurrentUser(Request $request): JsonResponse
    {
        $user = auth()->user();
        if ($user['role_id'] == 4) {
            $appointments = $user->visitor()->get();
        } else {
//            $appointments = $user->appointmentEmp()->get();
        }
        return response()->json([
            'status' => 'success',
            'data' => $appointments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
//        if ($this->check_image()) {
//            return to_route('home.home-user');
//        }
        return view('front.home.appointment.appointment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAppointmentRequest $request
     * @return JsonResponse
     */
    public function store(StoreAppointmentRequest $request): JsonResponse
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
            ], 420);
        }

        $res = [];
        $user = auth()->user();
        $count_appointments = $user->visitor()
                ?->whereDate('created_at', now()->today())
                ->get(['id']);

        if ($count_appointments) {
//            $emp_id = KodeEmp::where('kode_emp', $request->kode_emp)->first()['emp_id'];
            $appointment = $user->visitor()->create($validator->validate());
            if ($appointment) {
                // send event when visitor create appointment
//                HandleNotif::dispatch(auth()->user(), $emp_id);
                Notification::create([
                    'title' => 'New Appointment Created',
                    'status' => 'waiting',
                    'body' => $user['name'] ." has created new appointment"
                ]);
                $res = [
                    'success' => 'berhasil',
                    'msg' => 'Appointment berhasil dibuat'
                ];
            } else {
                $res = [
                    'success' => 'fail',
                    'msg' => 'Fail'
                ];
            }
        }
        return response()->json($res);
    }

    /**
     * this function for employee who has an appointment from visitors
     * the purpose is to approve the appointment and
     * insert data to visits table
     */
    public function approveAppointment(Appointment $appointment)
    {
        $visitor = User::find($appointment->visitor_id);
        $isAppproved = $appointment["status"] == "approved";
        // employee send notif to visitor
        HandleNotif::dispatch(auth()->user(), $visitor->id);
        if ($isAppproved) {
            $appointment->update(['status' => 'pending']);
            $visit = Visit::where('id_appmt', $appointment->id);
            $visit->delete();
            return response()->json([
                'status' => 'success',
                'msg' => 'Successfully change status to pending'
            ]);
        } else {
            $appointment->update(['status' => 'approved']);
            // insert into table visits for the first time status approved
            $visit = Visit::create([
                'id_appmt' => $appointment->id,
                'checkin' => false,
                'checkout' => false,
                'notes' => '',
                'visit_date' => now()
            ]);
            if ($visit) {
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Successfully approved'
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Appointment $appointment
     * @return Response
     */
    public function show(Appointment $appointment)
    {
        return view('front.home.appointment.detail-appointment', [
            'appointment' => $appointment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Appointment $appointment
     * @return Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAppointmentRequest $request
     * @param Appointment $appointment
     * @return Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Appointment $appointment
     * @return Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function getVisitorHasAppointment(Request $request)
    {
        $visitors = Appointment::get();
        return response()->json([
            'data' => $visitors
        ]);
    }
}
