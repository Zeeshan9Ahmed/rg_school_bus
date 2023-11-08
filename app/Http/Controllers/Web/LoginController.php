<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\Auth\ForgotPasswordRequest;
use App\Http\Requests\Api\User\Auth\ResetForgotPasswordRequest;
use App\Http\Requests\Web\SchoolSignUpRequest;
use App\Models\OtpCode;
use App\Models\User;
use App\Services\OTP\AccountVerification;
use App\Services\OTP\GenerateOTP;
use App\Services\OTP\ValidateOTP;
// use App\Http\Requests\Api\User\Auth\SignUpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class LoginController extends Controller
{
    public function login () {
        return view('school.login.login');

    }

    public function loginProcess (SchoolSignUpRequest $request) {
        $credentials = $request->only('email', 'password') + ['role' => 'school'];

        
        if (Auth::attempt($credentials, $request->get('rememberme'))) {
            return apiSuccessMessage("", ['url' => url('school/dashboard')]);
        }
        return commonErrorMessage("Invalid credientials",400);
    }

    public function dashboard(){
        return view('school.dashboard');
    }

    public function logout () {
        Auth::logout();

        return redirect()->route('school_login');
    }

    public function updateProfile (Request $request) {
        // return $request->all();

        auth()->user()->first_name = $request->first_name;
        auth()->user()->address = $request->address;
        auth()->user()->phone = $request->phone;
        auth()->user()->push_notification = $request->push_notification;
        auth()->user()->save();
        return commonSuccessMessage("Profile updated successfully.");
    }

    public function forgotPasswordForm () {
        return view('school.login.forgot-password');

    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (! $user) {
            return commonErrorMessage('Invalid Email', 200);
        }

        $data = ['email' => $user->email, 'type' => 'PASSWORD_RESET'];

        OtpCode::where(['email' => $request->email, 'ref' => 'PASSWORD_RESET'])->delete();
        $otp = app(GenerateOTP::class)->execute($data);

        // Mail::to($user->email)->send(new ForgotPasswordOTPMail($user,$otp));
        return response()->json([
            'status' => 1,
            'redirect_url' => url('school/verify-otp'),
            'message' => 'OTP verification code has been sent to your email address',
            'data' => ['email' => $user->email, 'type' => 'PASSWORD_RESET'],
        ]);

        return apiSuccessMessage('OTP verification code has been sent to your email address', ['id' => $user->id]);
    }

    public function verifyOTPForm(){
        return view('school.login.verify-otp');
    }

    public function otpVerify(Request $request)
    {
        $data = $request->all();
        $reference_code = $data['otp_digit_1'].$data['otp_digit_2'].$data['otp_digit_3'].$data['otp_digit_4'].$data['otp_digit_5'].$data['otp_digit_6'];

        $set_data = $request->only('email', 'type') + ['reference_code' => $reference_code];

        $check_otp = app(ValidateOTP::class)->execute($set_data);

        if ($request->type === 'ACCOUNT_VERIFICATION') {
            $user = app(AccountVerification::class)->execute(['email' => $check_otp->email]);
            $user = Auth::login($user);

            return response()->json([
                'status' => 1,
                'redirect_url' => url('business/complete-profile'),
                // 'message' => '',
                'data' => ['reference_code' => $reference_code],
            ]);
        } elseif ($request->type === 'PASSWORD_RESET') {
            return response()->json([
                'status' => 1,
                'redirect_url' => url('school/reset-password'),
                // 'message' => '',
                'data' => ['reference_code' => $reference_code],
            ]);
        }
    }

    public function resetPasswordForm(){
        return view('school.login.reset-password');
    }

    public function resetForgotPassword(ResetForgotPasswordRequest $request)
    {
        $check_otp = app(ValidateOTP::class)->execute(['email' => $request->email, 'reference_code' => $request->reference_code, 'type' => 'PASSWORD_RESET']);

        if (! $check_otp) {
            return commonErrorMessage('Invalid OTP verification code. ', 400);
        }

        $user = User::where('email', $check_otp->email)->first();
        $user->password = bcrypt($request->new_password);
        $user->save();
        $check_otp->delete();

        return response()->json([
            'status' => 1,
            'redirect_url' => url('school/login'),
            'message' => 'Password updated successfully',

        ]);
    }
}
