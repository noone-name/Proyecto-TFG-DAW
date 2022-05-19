<?php

use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AppoimentCalendarController;

use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AppoimentAdminController;
use App\Http\Controllers\Admin\CaseStatusAdminController;
use App\Http\Controllers\Admin\CaseAdminController;
use App\Http\Controllers\Admin\InvocesCaseController;





use App\Http\Controllers\Lawyer\LawyerIndexController;
use App\Http\Controllers\Lawyer\ManageController;
use App\Http\Controllers\Lawyer\NormalCasesStatusController;
use App\Http\Controllers\Lawyer\InvocesLawyerController;


use App\Http\Controllers\Clients\NormalCasesController;
use App\Http\Controllers\Clients\ClientIndexController;
use App\Http\Controllers\Clients\InvocesClientController;





use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

        Route::get('/dashboard', [RedirectController::class, 'index'])->name('dashboard');

});

Route::group(['middleware' => 'auth'], function() {

    Route::group(['middleware' => 'role:Cliente', 'prefix' => 'client', 'as' => 'client.'], function() {
       Route::get('/', [ClientIndexController::class, 'index'])->name('index');
         Route::resource('/normal_cases', NormalCasesController::class);
         Route::resource('/appoiments', AppoimentCalendarController::class);
         Route::resource('/invoces', InvocesClientController::class);


    });

   Route::group(['middleware' => 'role:Abogado', 'prefix' => 'lawyer', 'as' => 'lawyer.'], function() {
        Route::get('/', [LawyerIndexController::class, 'index'])->name('index');
         Route::resource('/manages', ManageController::class);
         Route::resource('/appoiments', AppoimentCalendarController::class);
         Route::resource('/normal_cases_status', NormalCasesStatusController::class);
         Route::resource('/invoces', InvocesLawyerController::class);

   });

   Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', [AdminIndexController::class, 'index'])->name('index');

     Route::get('/users', [UserController::class, 'index'])
        ->name('users.index');
     Route::get('/users/{user}', [UserController::class, 'show'])
            ->name('users.show');
     Route::delete('/users/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');
     Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])
            ->name('users.roles');
     Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])
            ->name('users.roles.remove');
     Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])
            ->name('users.permissions');
     Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])
            ->name('users.permissions.revoke');

     Route::resource('/roles', RoleController::class);
     Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])
            ->name('roles.permissions');
     Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])
            ->name('roles.permissions.revoke');

     Route::resource('/permissions', PermissionController::class);
     Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])
            ->name('permissions.roles');
     Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])
            ->name('permissions.roles.remove');

     Route::resource('/appoiments', AppoimentAdminController::class);
     Route::resource('/casesstatus', CaseStatusAdminController::class);
     Route::resource('/cases', CaseAdminController::class);
     Route::resource('/invocescases', CaseAdminController::class);

    });


});


