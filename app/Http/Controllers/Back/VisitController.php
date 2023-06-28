<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Conversation;
use App\Models\Notification;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Requests\VisitRequest;
use Illuminate\Support\Facades\Validator;
use App\Notify\NotifyHelper;

class VisitController extends Controller
{
    use NotifyHelper;

    public function index(Request $request)
    {
        $visitations = Visit::all();
        return view('back.content.visitation', [
            'visitations' => $visitations
        ]);
    }

    public function createVisitation(Request $request)
    {
        if ($id = $request->query('id')) {
            $appointment = Appointment::find($id);
        } else {
            $this->errorNotify("appointment not found!");
            return back();
//            $appointment = [];
        }
        return view('back.content.visitation.create', compact('appointment'));
    }

    public function storeVisitation(Request $request)
    {

        if (!$id = $request->input("id_ap")) { $this->errorNotify("appointment not found!");
            return back();
        }

        $ap = Appointment::find($id);
        $request->validate(['status' => 'required|in:approved,rejected',]);
        // handle if status is rejected
        if ($status = $request->input("status") and $status == "rejected") {
            $request->validate(['message' => 'string']);
            $conv = Conversation::createConversation($request->input("id_visitor"));
            Notification::create([
                "con_id" => $conv["id"],
                'title' => 'Appointment Rejected',
                'status' => 'unread',
                'body' => $request->input("message"),
            ]);
            $ap->update([
                'status' => 'rejected'
            ]);

            $this->warningNotify("This appointment has been rejected");
            return back();
        }


        $data = $request->validate([
            'emp_id' => 'required|exists:users,id',
            'visit_date' => 'nullable'
        ], [
            'emp_id.required' => 'harus diisi',
            'emp_id.exists' => 'Karyawan tidak ditemukan',
        ]);

        // check visitation had been added exists
        $exists = $ap->visit()->first();
        if ($exists) {
            $this->notyf()->addWarning("This appointment has been added");
            return back();
        }

        $visit = Visit::create([
            'appointment_id' => $ap["id"],
            'emp_id' => $data['emp_id'],
            'visit_date' => $data['visit_date'],
            'checkin' => false,
            'checkout' => false,
            'notes' => '',
            'approved_by' => auth()->id()
        ]);
        if ($visit) {
            $conv = Conversation::createConversation($data["emp_id"], $request->input("id_visitor"));
            Notification::create([
                "con_id" => $conv["id"],
                'title' => 'Appointment Approved',
                'status' => 'unread',
                'body' => $request->input('message') ?? 'Your appointment has been approved by admin',
            ]);
            $emp_name = User::find($data["emp_id"])["name"];
            $ap->update([
                'status' => 'approved',
                "name_emp" => $emp_name
                ]);
            $this->successNotify("New Visitation successfully added");
            return back();
        }
        $this->errorNotify("New Visitation successfully added");
        return back();

    }


    // not use
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

    public function checkin(Request $request, Visit $visit)
    {
        // not checkin // prevent checkin more than one
        if (!$visit->checkin) {
            $visitor = $visit->appointment()->latest()->first()["visitor"];
            $conv = Conversation::createConversation($visit["emp_id"]);
            Notification::create([
                'con_id' => $conv["id"],
                'title' => 'Feedback submitted',
                'status' => 'unread',
                'body' => "Visitor $visitor->name has checkin you may pick up in lobby"
            ]);
            $visit->update([
                'checkin' => true,
                'checkin_at' => now()->format("H:i:s"),
            ]);
        }
        return response()->json([
            'status' => 'success',
            'data' => $visit
        ]);
    }

    public function toCheckout(Request $request, Visit $visit)
    {
        return view('front.home.visitation.craete-feedback', compact('visit'));
    }

    public function checkout(Request $request, Visit $visit)
    {
        $request->validate([
            'notes' => 'required|string|min:10',
        ], [
            'notes.required' => 'Field notes must be filled'
        ]);
        $isUpdated = $visit->update([
            "notes" => $request->notes
        ]);

        if ($isUpdated) {
            $user = auth()->user();
            $conv = Conversation::createConversation(auth()->id(), $visit["emp_id"]);
            Notification::create([
                'con_id' => $conv["id"],
                'title' => 'Feedback submitted',
                'status' => 'success',
                'body' => "Visitor $user->name has submitted the feedback you may checkout this visitor"
            ]);
            return back()->with('success', 'Your feedback has been recorded in our system');
        }
        return back()->with('error', 'There  something went wrong');

    }

    public function listVisitationVisitors(Request $request)
    {
        $visitations = Visit::where('appointment_id', '!=', null)->get();
        return view(
            'front.home.visitation.list-visitation', [
                'visitations' => $visitations
            ]
        );
    }

//    public function detailVisitorVisitation(Request $request)
//    {
//        $id_appointment_visitor = $request->query('id');
//        $visitor = Visit::where('id_appmt', $id_appointment_visitor)->first();
//        if (!$visitor) return back();
//        return view('front.home.visitation.detail-visitation-visitor', [
//            'visitor' => $visitor
//        ]);
//    }

    public function visitationOverview() // to chart
    {
        // typo
        $count_each_visitors_by_mount = Visit::all()->count();
        return response()->json([
            'status' => 'success',
            'data' => $count_each_visitors_by_mount
        ]);
    }


    /*
     * get all visitor have approved
     * checkin
     * */
    public function getVisitors() {
        /*
         * get all data checkin/checkout is 0
         * get data that created at is dua/satu hari sebelum hari ini
         * */
        $visits = Visit::all();

        $visitors = array();
        foreach ($visits as $visit) {
            $ap = $visit->appointment()->first();
            $visitor = $ap->visitor()->first();

            $value = [
                "visit_id" => $visit["id"],
                "emp_id" => $visit["emp_id"],
                "visitor_id" => $visitor["id"],
                "visitor_name" => $visitor["name"],
                "visitor_picture" => $visitor["detail"]["picture"],
                "visitor_image"=> $visitor["image_id"]->first(["image_name","image_size","image_descriptor"]),
            ];
            $visitors[] = $value;
        }
        return response()->json([
            'status' => 'success',
            'data' => $visitors
        ]);
    }

    public function viewCheckin(Request $request, Visit $visit) {
        $ap = $visit->appointment()->first();
        $visitor = $ap->visitor()->first();
        $detail = [
            "name" => $visitor["name"],
            "picture" => $visitor["detail"]["picture"],
            "status" => "Success",
            "to" => $visit->employee["name"],
            "purpose"=>$ap["purpose"],
            "checkin_at" => $visit["checkin_at"]
        ];
        return view('front.home.visitation.view-checkin', compact('detail'));
    }
}
