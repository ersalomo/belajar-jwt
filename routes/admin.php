<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\{
    AuthAdminController,
    DataAppointmentController,
    VisitController,
    DashboardController,
    DapartmentController,
    UserController
};

Route::get('/', fn() => to_route('admin-auth.index'));
Route::get('export', [\App\Http\Controllers\User\UserController::class, 'exportUsers']);

Route::group([
    'middleware' => ['guest:web'],
    'prefix' => 'auth',
    'as' => 'admin-auth.'
], function () {
    Route::get('login', [AuthAdminController::class, 'index'])->name('index');
    Route::post('login', [AuthAdminController::class, 'login'])->name('login');
});


Route::group([
    'middleware' => ['auth:web'],
    'as' => 'admin.'
],
    function () {
        Route::middleware(['admin'])->group(function () {
            Route::controller(UserController::class)->as('user.')->prefix('user')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
//                Route::delete('{user}', 'destroy')->name('destroy');
            });

            Route::delete('logout', [AuthAdminController::class, 'logout'])->name('logout');
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('list-appointments', [DataAppointmentController::class, 'index'])->name('list-appointments');

            Route::view('roles-list', 'back.content.roles-table')->name('roles-list');

            Route::resource('visit', VisitController::class);

            Route::controller(VisitController::class)->as('visit.')->group(function (){
                Route::get('visitation-overview', 'visitationOverview')->name('overview-visitation');
            });

            Route::controller(DapartmentController::class)->as('department.')->group(function (){
                Route::get('departments', 'index')->name('index');
            });
        });
    });
