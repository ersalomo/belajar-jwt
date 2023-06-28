<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    User\UserController,
    Back\VisitController,
    HomePageController,
    FaceDetectionController as FaceDetection,
    AppointmentController
};


Route::get('/', fn() => redirect()->to('/auth'));
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

    Route::controller(HomePageController::class)->group(function () {
        Route::get('/', 'index')->name('home-user');
    });

    Route::controller(VisitController::class)->group(function () {
//        Route::post('post-visit', 'store')->name('post-visit');
        Route::post('checkin-visit/{visit}', 'checkin')->name('checkin-visit');
        Route::get ('list-visitations', 'listVisitationVisitors')->name('list-visitations'); //security
        Route::get ('to-checkout/{visit}', 'toCheckout')->name('to-checkout-visit');
        Route::post('checkout-visit/{visit}', 'checkout')->name('checkout-visit');
        Route::get('get-visitations', 'getVisitors')->name('get-visits');
        Route::get('view-visitations-checkin/{visit}', 'viewCheckin')->name('get-visits');
    });

    Route::controller(UserController::class)->group(function () {
        Route::view('me/profile', 'front.home.user.profile')->name('me.profile');
        Route::post('change-profile-picture', 'changeProfile')->name('change-profile-picture');
        Route::post('logout', 'logout')->name('logout');
//        Route::put('me/change-password', 'changePassword')->name('me.change-password');
    });

    Route::controller(AppointmentController::class)->group(function () {
        Route::get('appointments', 'index')->name('list-appointment');
        Route::get('create-appointment', 'create')->name('appointment.create');
        Route::get('appointment/{appointment}', 'show')->name('appointment.show');
        Route::post('appointment', 'store')->name('appointment.store');
        Route::get('get-appointments', 'getAppointmentsCurrentUser')->name('appointment.lists');
//        Route::post('appointment/update-approve/{appointment}', 'approveAppointment')->name('appointment.update-approve');
//        Route::get('appointment-visitors', 'getVisitorHasAppointment')->name('visitors');
    });

    Route::controller(FaceDetection::class)->group(function () {
        Route::get('face-detection', 'index')->name('face-detection');
        Route::get('face-verified', 'faceVerify')->name('face-verified');
        Route::get('face-recog', 'faceRecog')->name('face-recog'); // just for security

        Route::get('face-screening', 'viewFaceScreening')->name('get.face-screening');
        Route::post('face-screening', 'faceScreening')->name('post.face-screening');
        Route::get('faces', 'getImagesDesc')->name('get.faces');
    });

    Route::view('approval-visitors','front.home.approval.index')->name('approval.index'); // emp
});
