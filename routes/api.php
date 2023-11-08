<?php

use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\FarePriceController;
use App\Http\Controllers\Api\FeedBackController;
use App\Http\Controllers\Api\FilterController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\SchoolController;
use App\Http\Controllers\Api\User\Auth\LoginController;
use App\Http\Controllers\Api\User\Auth\PasswordController;
use App\Http\Controllers\Api\User\Auth\SignUpController;
use App\Http\Controllers\Api\User\Core\IndexController;
use App\Http\Controllers\Api\User\OTP\VerificationController;
use App\Http\Controllers\Api\User\Profile\ProfileController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login', function () {
    return response()->json(["status" => 0, "message" => "Sorry User is Unauthorize"], 401);
})->name('login');

Route::post('signin', [SignUpController::class, 'signIn']);
Route::post('signup/resend-otp', [SignUpController::class, 'resendSignUpOtp']);

Route::post('otp-verify', [VerificationController::class, 'otpVerify']);

Route::post('login', [LoginController::class, 'login']);
Route::post('forgot-password', [PasswordController::class, 'forgotPassword']);
Route::post('reset/forgot-password', [PasswordController::class, 'resetForgotPassword']);
Route::get('content', [ProfileController::class, 'content']);
Route::post('social', [LoginController::class, 'socialAuth']);

// Route::get('hanan', [LoginController::class, 'hanan']);


// Route::get('');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('change-password', [ProfileController::class, 'changePassword']);
    Route::post('update-profile', [ProfileController::class, 'completeProfile']);
    // Route::get('profile', [ProfileController::class , 'profile']);
    Route::post('logout', [LoginController::class, 'logout']);


    //Core Module
    Route::get('schools', [SchoolController::class, 'schools']);
    Route::post('add-child', [SchoolController::class, 'addChild']);
    Route::get('pending-requests', [SchoolController::class, 'pendingRequests']);


    Route::post('update-child', [UserController::class, 'updateChild']);
    Route::post('delete-child', [UserController::class, 'deleteChild']);


    Route::get('childs', [UserController::class, 'childs']);
    Route::get('travel-history', [UserController::class, 'travelHistory']);
    Route::post('child-attendance-status', [UserController::class, 'childAttendanceStatus']);
    Route::post('dashboard', [UserController::class, 'dashboard']);

    Route::get('request-status', [UserController::class, 'requestStatus']);


    Route::group(['prefix' => 'driver'], function () {
        Route::get('childs', [DriverController::class, 'getDriverChilds']);
        Route::get('dropped-off', [DriverController::class, 'getDroppOffChilds']);
        Route::post('update-status', [DriverController::class, 'driverUpdateChildStatus']);

        Route::get('childs-count', [DriverController::class, 'childsCount']);

        Route::get('parents', [DriverController::class, 'getParents']);

        Route::get('calendar', [DriverController::class, 'studentsAttendanceDateWise']);
        Route::get('absent-students-dates', [DriverController::class, 'absentStudentDates']);

        Route::get('notify', [DriverController::class, 'notify']);
    });

    Route::post('toggle-notification', [ProfileController::class, 'toggleNotification']);
    Route::get('notifications', [ProfileController::class, 'notifications']);

    Route::get('chat-list', [MessageController::class, 'chatList']);

    Route::get('steps-data', [DriverController::class, 'stepsData']);
});
Route::get('reset', [MessageController::class, 'reset']);
