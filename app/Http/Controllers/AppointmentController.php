<?php

namespace App\Http\Controllers;

use App\Models\{Appointment, KodeEmp, Visitor};
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\{
    StoreAppointmentRequest,
    UpdateAppointmentRequest
};
use App\Events\{
    ServerCreated,
    AppointmentCreated,
};
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
        $user = auth()->user();
        ServerCreated::dispatch($user->lastname);
        AppointmentCreated::dispatch($user->email);
        return view('front.home.list-appointment');
    }

    public function getAppointmentsCurrentUser(Request $request): JsonResponse
    {
        $user = auth()->user();
        if ($user['role_id'] == 4){
            $appointments = $user->appointmentVisitor()->get();
        }else{
            $appointments = $user->appointmentEmp()->get();
        }
        return response()->json([
            'status' => 'success',
            'data' => $appointments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
//        if ($this->check_image()) {
//            return to_route('home.home-user');
//        }
        return view('front.home.appointment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAppointmentRequest $request
     * @return Response
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
                'errros' => $validator->errors()->toArray()
            ]);
        }
        $res = [];
        $user = auth()->user();
        $count_appointments = $user->appointmentVisitor()
                ?->whereDate('created_at', now()->today())
                ->get(['id']) || false;

        if ($count_appointments) {
            $emp_id = KodeEmp::where('kode_emp',$request->kode_emp)->first()['emp_id'];
            $appointment = $user->appointmentVisitor()->create([
                'kode_emp' => $emp_id,
                'purpose' => $request->purpose,
                'type' => $request->type,
            ]);
            if ($appointment) {
                AppointmentCreated::dispatch($user);
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
        $isAppproved = $appointment["status"] != "pending";
        if ($isAppproved) {
            $appointment->update(['status' => 'pending']);
        }else{
             $appointment->update(['status' => 'approved']);
        }
        AppointmentCreated::dispatch(auth()->user());
        // insert into table visits
//        $visit = Visit::create([
//            'id_appmt' => $appoinment->id,
//            'checkin' => false,
//            'checkout' => false,
//            'notes' => '',
//            'visit_date' => now()
//        ]);
//        if ($visit)
//            return response()->json([
//                'status' => 'success',
//                'msg' => 'Successfully approved'
//            ]);
        return response()->json([
            'status' => 'success',
            'msg' => 'there something went wrong!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Appointment $appointment
     * @return Response
     */
    public function show(Appointment $appointment)
    {
        return view('front.home.detail-appointment', [
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
