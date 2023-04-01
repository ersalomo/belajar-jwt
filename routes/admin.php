<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\{
    AuthAdminController,
    DataEmployeeController,
    DataVisitorController,
    DataAppointmentController
};

Route::group([
    'prefix' => 'auth',
    'as' => 'admin-auth.'
], function () {
    Route::get('login', [AuthAdminController::class, 'index'])->name('index');
    Route::post('login', [AuthAdminController::class ,'login'])->name('login');
});


Route::group([
//        'middleware' =>
    'as' => 'admin.'
],
    function () {
        Route::delete('logout', [AuthAdminController::class, 'logout'])->name('logout');

        // Authenticated
        Route::view('dashboard', 'back.content.dashboard')->name('dashboard');
        Route::get('employee-table', [DataEmployeeController::class, 'index'])->name('employee-table');
        Route::get('visitor-table', [DataVisitorController::class, 'index'])->name('visitor-table');

        // data appointment
        Route::get('list-appointments', [DataAppointmentController::class, 'index'])->name('list-appointments');

        // roles
        Route::view('roles-list', 'back.content.roles-table')->name('roles-list');

    });
