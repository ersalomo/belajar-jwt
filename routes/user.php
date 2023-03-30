<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\{
    Api\UserController as UC,
    User\UserController
};

Route::get('/', fn () => to_route('auth'));
Route::group([
    'as' => 'auth'
], function () {
    Route::view('/auth', 'front.auth.authentication');
});

Route::group([
    'middleware' => ['auth:visitor,employee'], // wtf
//    'middleware' => ['guest:visitor,employee'],
    'prefix' => 'oa',
    'as' => 'home.'
], function () {
    Route::view('/', 'front.home.home')->name('home-user');
    Route::get('list-appointment', [AppointmentController::class, 'index'])->name('list-appointment');
    Route::post('appointment', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('appointment', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::view('me/profile', 'front.home.profile')->name('me.profile');
    Route::put('me/change-password', [UserController::class, 'changePassword'])->name('me.change-password');
    Route::post('logout', function(){
        \Illuminate\Support\Facades\Auth::logout();
        return to_route('auth');
    })->name('logout');

    // admin
    Route::put('appointment/update-approve/{appoinment}',[AppointmentController::class,'approveAppointment'])->name('update-approve');
});
