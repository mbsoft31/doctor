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
})->name("home");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get("/doctor/search", [\App\Http\Controllers\DoctorController::class, "search"])
    ->name("doctor.search");

Route::get("/laboratory/search", [\App\Http\Controllers\LaboratoryController::class, "search"])
    ->name("laboratory.search");

Route::get("/appointment/create/{type}/{model}", [\App\Http\Controllers\AppointmentController::class, "create"])
    ->name("appointment.create");

Route::get("/patient/appointment", [\App\Http\Controllers\AppointmentController::class, "index"])
    ->name("patient.appointment.index")
    ->middleware(["auth", "role:patient"]);

Route::get("/doctor/appointment", [\App\Http\Controllers\AppointmentController::class, "index"])
    ->name("doctor.appointment.index")
    ->middleware(["auth", "role:doctor"]);
