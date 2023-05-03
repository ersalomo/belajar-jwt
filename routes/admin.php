<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\{
    AuthAdminController,
    DataVisitorController,
    DataAppointmentController,
    DataEmployeeController,
    VisitController,
    DashboardController
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
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('employee-table', [DataEmployeeController::class, 'index'])->name('employee-table');
        Route::get('add-employee', [DataEmployeeController::class, 'create'])->name('add-employee');
        Route::post('add-employee', [DataEmployeeController::class, 'post'])->name('post-employee');

        Route::get('visitor-table', [DataVisitorController::class, 'index'])->name('visitor-table');
        Route::get('create-visitor', [DataVisitorController::class, 'create'])->name('create-visitor');
        Route::post('add-visitor', [DataVisitorController::class, 'store'])->name('post-visitor');

        // data appointment
        Route::get('list-appointments', [DataAppointmentController::class, 'index'])->name('list-appointments');

        // roles
        Route::view('roles-list', 'back.content.roles-table')->name('roles-list');

        //Visitation

        Route::resource('visit', VisitController::class);

    });
