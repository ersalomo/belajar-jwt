<?php

namespace App\Http\Controllers;

use App\Events\ServerCreated;
use Illuminate\Http\Request;
use App\Events\HandleNotif;

class HomePageController extends Controller
{
    public function index(Request $request) {
         $user = auth()->user();
//        HandleNotif::dispatch($user);
        return view('front.home.home');
    }
}
