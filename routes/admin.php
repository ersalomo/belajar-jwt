<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\{
    AuthAdminController,
    DataEmployeeController,
    DataVisitorController,
    DataAppointmentController
};

Route::group([
    'prefix' => 'auth'
], function () {
    Route::get('login', [AuthAdminController::class, 'index'])->name('admin-auth.index');
});


Route::group([
//        'middleware' =>
    'as' => 'admin.'
],
    function () {

        Route::view('dashboard', 'back.content.dashboard')->name('dashboard');
        Route::get('employee-table', [DataEmployeeController::class, 'index'])->name('employee-table');
        Route::get('visitor-table', [DataVisitorController::class, 'index'])->name('visitor-table');

        // data appointment
        Route::get('list-appointments', [DataAppointmentController::class, 'index'])->name('list-appointments');

        // roles
        Route::view('roles-list', 'back.content.roles-table')->name('roles-list');

    });
