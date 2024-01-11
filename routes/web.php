<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PointServiceController;
use App\Http\Controllers\CustomerBookingController;

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
    return view('welcome');
});

Route::resource('services', ServiceController::class);
Route::resource('points', PointController::class);
Route::resource('customers', CustomerController::class);
Route::resource('points.services', PointServiceController::class);
Route::post('/points/{point}/services/{service}/status', [PointServiceController::class, 'status'])->name('points.services.status');
Route::resource('bookings', BookingController::class);
Route::resource('customers.bookings', CustomerBookingController::class);