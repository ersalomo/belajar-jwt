<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Appointment, Visit};

class DashboardController extends Controller
{
    public function index(Request $request) {
        return view('back.content.dashboard', [
            'appointments' => Appointment::all(),
            'visitors_checkin' => Visit::where('checkin', 1)->paginate(5),
        ]);
    }
}
