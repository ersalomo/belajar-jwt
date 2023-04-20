<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Appointment};

class DataAppointmentController extends Controller
{
    public function index(Request $request){
        return view('back.content.data-appointment', [
            'appointments' => Appointment::paginate(20),
        ]);
    }
}
