<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Appointment, User, Visit};

class DashboardController extends Controller
{
    public function index(Request $request) {
//        $posts = Post::whereDate('created_at', Carbon::today())->get();

        return view('back.content.dashboard', [
            'visitors_checkin' => Visit::where('checkin', 1)->paginate(5), // get vsiistos who visit today
            'appointments' => Appointment::all(),
            'total_employees' => User::whereNot('role_id', 4)->count(['id']),
            'total_visitors' => User::where('role_id', 4)->count(['id']),
            'total_appointments' => Appointment::count(),
            'total_visitations' => Visit::count(),
        ]);
    }
}
