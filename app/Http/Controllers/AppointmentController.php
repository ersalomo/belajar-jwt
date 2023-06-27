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
    public function index()
    {
        return view('front.home.appointment.list-appointment');
    }


    public function create()
    {
        $user = auth()->user();
        if($user["role_id"] !== 4) return back();


            //  no face detected
        $picture = explode("/", $user->detail["picture"]);
        $isDefaultImg = end($picture) == "img.png";
        if(!$user->image_id()->exists() and $isDefaultImg) {
            return back()->with("warning","Image must be uploaded as evidence");
        }

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
        $count_appointments = $user->appointment()
                ?->whereDate('created_at', now()->today())
                ->get(['id']);

        if ($count_appointments) {
            $appointment = $user->appointment()->create($validator->validate());
            if ($appointment) {
                Notification::create([
                    'title' => 'New Appointment Created',
                    'status' => 'unread',
                    'body' => $user["name"] ." has created new appointment"
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
    public function show(Appointment $appointment)
    {
        return view('front.home.appointment.detail-appointment', [
            'appointment' => $appointment
        ]);
    }

    /**
     * this function for employee who has an appointment from visitors
     * the purpose is to approve the appointment and
     * insert data to visits table
     */
//    public function approveAppointment(Appointment $appointment)
//    {
//        $visitor = User::find($appointment["visitor_id"]);
//        $isApproved = $appointment["status"] == "approved";
//        // employee send notify to visitor
//        HandleNotif::dispatch(auth()->user(), $visitor->id);
//        if ($isApproved) {
//            $appointment->update(['status' => 'pending']);
//            $visit = Visit::where('id_appmt', $appointment->id);
//            $visit->delete();
//            return response()->json([
//                'status' => 'success',
//                'msg' => 'Successfully change status to pending'
//            ]);
//        } else {
//            $appointment->update(['status' => 'approved']);
//            // insert into table visits for the first time status approved
//            $visit = Visit::create([
//                'id_appmt' => $appointment->id,
//                'checkin' => false,
//                'checkout' => false,
//                'notes' => '',
//                'visit_date' => now()
//            ]);
//            if ($visit) {
//                return response()->json([
//                    'status' => 'success',
//                    'msg' => 'Successfully approved'
//                ]);
//            }
//        }
//    }

    public function getAppointmentsCurrentUser(Request $request): JsonResponse
    {
        $user = auth()->user();
        if ($user['role_id'] == 4) {
            $appointments = $user->appointment()->get();
        } else {
//            $appointments = $user->appointmentEmp()->get();
        }
        return response()->json([
            'status' => 'success',
            'data' => $appointments
        ]);
    }
}
