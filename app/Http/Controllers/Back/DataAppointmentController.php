<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Appointment};

class DataAppointmentController extends Controller
{
    public function index(Request $request){
        return view('back.content.data-appointment', [
            'appointments' => Appointment::latest()->paginate(20),
        ]);
    }
    public function destroy(Appointment $appointment) {
        $appointment->delete();
        return back()->with('success','appointment berhasil di hapus');
    }
}
