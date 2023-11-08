<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\Auth\ResendSignUpOtpRequest;
use App\Http\Requests\Api\User\Auth\SignUpRequest;
use App\Models\User;
use App\Services\User\AccountVerificationOTP;
use App\Services\User\CreateUser;
use Illuminate\Http\Request;
use App\Http\Resources\LoggedInUser;

class SignUpController extends Controller
{


    public function signIn(SignUpRequest $request)
    {


        $data = $request->only(['email', 'device_type', 'device_token', 'first_name', 'last_name']);

        if ($request->type == "signup") {

            $user = app(CreateUser::class)->execute($data + ['role' => 'parent']);

            $sendOtp = app(AccountVerificationOTP::class)->execute(['user' => $user]);

            return apiSuccessMessage("Signup Successfully", ['id' => $user->id, 'email' => $user->email]);
        }

        $check = User::where('email', $request->email)->first();

        if (!$check) {
            return commonErrorMessage("Account not found", 400);
        } else {
            $role = $request->role;
            if ($check->role != $role) {
                return commonErrorMessage("Invalid credeintials", 400);
            }
            $sendOtp = app(AccountVerificationOTP::class)->execute(['user' => $check]);
            $check->device_type = $request->device_type;
            $check->device_token = $request->device_token;
            $check->save();

            $user = User::with('bus')->whereId($check->id)->first();

            return apiSuccessMessage("Signin Successfully", new LoggedInUser($user));
        }
    }


    public function resendSignUpOtp(ResendSignUpOtpRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return commonErrorMessage("No User Found", 404);
        }

        // if ( $user->email_verified_at != null )
        // {
        //     return commonErrorMessage("Account already verified", 400);
        // }

        $otp_code = app(AccountVerificationOTP::class)->execute(['user' => $user]);

        return commonSuccessMessage("Verification Code Sent Successfully", 200);
    }
}
