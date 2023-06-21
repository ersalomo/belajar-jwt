<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\KodeEmp;
use App\Models\Notification;
use App\Models\Visit;
use Illuminate\Http\Request;

class ApprovalVisitationController extends Controller
{
    public function index()
    {
        // mendapatkan semua visit pada hari ini berdasarkan karyawan logged
        return view("front.home.approval.index", [
//            'visitations' => Visit::all()
        ]);
    }
    public function createFeedback(Request $request, Visit $visit)
    {
        return view('front.home.visitation.craete-feedback', compact('visit'));
    }

    public function storeFeedback(Request $request, Visit $visit)
    {
        $request->validate([
            'notes' => 'required|min:10'
        ], [
            'notes.required' => 'Field notes must be filled'
        ]);
        $isUpdated = $visit->update([
            "notes" => $request->notes
        ]);
        if ($isUpdated) {
            $name = auth()->user()->name;
            Notification::create([
                'title' => 'Feedback Submited',
                'status' => 'success',
                'body' => "Visitor $name has submitted the feedback you may checkout this visitor"
            ]);
            return back()->with('success', 'Your feedback has been recorded in our system');
        }
        return back()->with('error', 'There  something went wrong');
    }
}
