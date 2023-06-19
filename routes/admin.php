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
                Route::get('create', 'createAndEdit')->name('create');
                Route::post('store', 'store')->name('store');
                Route::post('update/{user}', 'update')->name('update');
                Route::get('get-all-employees', 'getAllEmployees')->name('get-all-employees');
            });

            Route::delete('logout', [AuthAdminController::class, 'logout'])->name('logout');
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('list-appointments', [DataAppointmentController::class, 'index'])->name('list-appointments');
            Route::view('roles-list', 'back.content.roles-table')->name('roles-list');


            Route::controller(VisitController::class)->as('visit.')->group(function (){
                Route::get('visitation-index', 'index')->name('visitation-index');
                Route::get('visitation/visitation-overview', 'visitationOverview')->name('overview-visitation');
                Route::get('visitation/create-new-visitation', 'createVisitation')->name('create-new-visitation');
            Route::post('visitation/store-new-visitation', 'storeVisitation')->name('store-new-visitation');
            });

            Route::controller(DapartmentController::class)->as('department.')->group(function (){
                Route::get('departments', 'index')->name('index');
                Route::post('departments', 'store')->name('store');
            });
        });
    });
