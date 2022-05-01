<?php

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
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});


Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:client', 'prefix' => 'client', 'as' => 'client.'], function() {
        Route::resource('listings', \App\Http\Controllers\Clients\ListingController::class);
    });
   Route::group(['middleware' => 'role:lawyer', 'prefix' => 'lawyer', 'as' => 'lawyer.'], function() {
       Route::resource('manages', \App\Http\Controllers\Lawyer\ManageController::class);
   });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    });
});


