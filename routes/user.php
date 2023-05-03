<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FaceDetectionController as FaceDetection;
use App\Http\Controllers\{
    User\UserController,
    Back\VisitController,
};


Route::get('face-detection', [FaceDetection::class, 'index'])->name('face-detection');
Route::post('face-detection', [FaceDetection::class, 'store'])->name('store.face-detection');
Route::get('labeled-faces', [FaceDetection::class, 'labeledFaces'])->name('labeled-faces');
Route::get('face-verified', [FaceDetection::class, 'faceVerify'])->name('face-verified');
Route::get('visitors', [UserController::class, 'get_visitors'])->name('visitors');
Route::get('appointment-visitors', [AppointmentController::class, 'getVisitorHasAppointment'])->name('visitors');
Route::post('post-visit', [VisitController::class, 'store'])->name('post-visit');


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
    Route::get('get-appointments', [AppointmentController::class, 'getAppointmentsCurrentUser'])->name('appointment.lists');
    Route::view('me/profile', 'front.home.profile')->name('me.profile');
    Route::put('me/change-password', [UserController::class, 'changePassword'])->name('me.change-password');
    Route::post('change-profile-picture', [UserController::class,'changeProfile'])->name('change-profile-picture');
    Route::post('logout', function(){
        \Illuminate\Support\Facades\Auth::logout();
        return to_route('auth');
    })->name('logout');

    Route::post('appointment/update-approve/{appoinment}',[AppointmentController::class,'approveAppointment'])->name('update-approve');

    // FC

    // VisitController
    Route::get('list-visitations', [VisitController::class, 'listVisitationVisitors'])->name('list-visitations');
});
