<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FaceDetectionController as FaceDetection;
use App\Http\Controllers\{
    User\UserController,
    Back\VisitController,
    Back\ApprovalVisitationController,
    HomePageController
};


Route::group([
    'middleware' => ['guest:web'],
    'as' => 'auth'
], function () {
    Route::view('/auth', 'front.auth.authentication');
});

Route::group([
    'middleware' => ['auth:web'],
    'prefix' => 'oa',
    'as' => 'home.'
], function () {

    Route::controller(HomePageController::class)->group(function (){
        Route::get('/', 'index')->name('home-user');
    });

    Route::controller(VisitController::class)->group(function () {
        Route::post('post-visit', 'store')->name('post-visit');
        Route::post('checkin-visit/{id}', 'checkin')->name('checkin-visit');
        Route::get  ('list-visitations', 'listVisitationVisitors')->name('list-visitations');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get ('me/profile', 'showProfile')->name('me.profile');
        Route::put ('me/change-password', 'changePassword')->name('me.change-password');
        Route::post('change-profile-picture', 'changeProfile')->name('change-profile-picture');
        Route::post('logout', 'logout')->name('logout');
    });

    Route::controller(AppointmentController::class)->group(function () {
        Route::get  ('list-appointment',  'index')->name('list-appointment');
        Route::post('appointment', 'store')->name('appointment.store');
        Route::get  ('appointment', 'create')->name('appointment.create');
        Route::get  ('detail-appointment/{appointment}', 'show')->name('appointment.show');
        Route::get  ('get-appointments', 'getAppointmentsCurrentUser')->name('appointment.lists');
        Route::post('appointment/update-approve/{appointment}', 'approveAppointment')->name('update-approve');
        Route::get  ('appointment-visitors', 'getVisitorHasAppointment')->name('visitors');
    });

    Route::controller(FaceDetection::class)->group( function () {
        Route::get  ('face-detection', 'index')->name('face-detection');
        Route::post('face-detection', 'store')->name('store.face-detection');
        Route::get  ('face-labeled', 'labeledFaces')->name('labeled-faces');
        Route::get  ('face-verified',  'faceVerify')->name('face-verified');
        Route::get  ('face-recog',  'faceRecog')->name('face-recog');
    });

    Route::controller(ApprovalVisitationController::class)->as('approval.')->group(function (){
        Route::get('approval-visitors', 'index')->name('index');
    });
});
