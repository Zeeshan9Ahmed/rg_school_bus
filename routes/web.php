<?php

use App\Http\Controllers\Api\ParentController;
use App\Http\Controllers\Api\User\Profile\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\DriverController;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\MessageController;
use App\Http\Controllers\Web\SettingController;
use App\Http\Controllers\Web\StudentController;
use App\Models\State;
use App\Models\VehicleRideChargeStateWise;
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


Route::prefix('school')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('school_login');
    Route::post('login-process', [LoginController::class, 'loginProcess'])->name('login-process');
    Route::get('forgot-password', [LoginController::class, 'forgotPasswordForm'])->name('forgot-password');
    Route::post('forgot-password', [LoginController::class, 'forgotPassword']);
    Route::get('verify-otp', [LoginController::class, 'verifyOTPForm']);
    Route::post('otp-verify', [LoginController::class, 'otpVerify']);
    Route::get('reset-password', [LoginController::class, 'resetPasswordForm']);
    Route::post('change-password', [LoginController::class, 'resetForgotPassword']);





    Route::group(['middleware' => 'school'], function () {


        Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::post('update-profile', [LoginController::class, 'updateProfile']);


        Route::get('parent-list', [ParentController::class, 'parentList'])->name('parent-list');
        Route::get('parent-detail/{id}', [ParentController::class, 'parentDetail']);
        Route::post('update-child', [ParentController::class, 'updateChild']);


        Route::get('parent-requests', [ParentController::class, 'parentRequests']);

        Route::post('disapprove-request', [ParentController::class, 'disapproveRequest'])->name('disapprove-request');
        Route::post('drivers', [ParentController::class, 'drivers'])->name('drivers');
        Route::post('approve-request', [ParentController::class, 'approveRequest'])->name('approve-request');

        Route::get('students', [StudentController::class, 'students'])->name('student-list');
        Route::get('student/{id}', [StudentController::class, 'studentDetail']);


        Route::post('update-driver-profile', [DriverController::class, 'updateDriverProfile']);
        Route::get('drivers', [DriverController::class, 'drivers']);
        Route::get('driver/{id}', [DriverController::class, 'driverDetail']);
        Route::post('driver', [DriverController::class, 'addDriver']);
        Route::get('buses', [DriverController::class, 'buses']);
        Route::post('bus', [DriverController::class, 'bus']);


        Route::get('route-map', [RouteController::class, 'routeMap'])->name('route-map');
        Route::get('messages', [MessageController::class, 'messages'])->name('messages');
        Route::get('inbox', [MessageController::class, 'inbox'])->name('inbox');

        Route::get('settings', [SettingController::class, 'settings'])->name('settings');
    });
});

Route::get('/dashboard', function () {
    return view('web.dashboard');
});

Route::get('content/{type}', [HomeController::class, 'content']);
