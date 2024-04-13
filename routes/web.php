<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorScheduleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function(){
    // Route::resource('home',DoctorController::class);
    Route::resource('user',UserController::class);
    Route::resource('doctor',DoctorController::class);
    Route::resource('doctor-schedules',DoctorScheduleController::class);
});

