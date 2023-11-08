<?php

namespace App\Http\Controllers\Api\User\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\Auth\ChangePasswordRequest;
use App\Http\Requests\Api\User\Profile\UpdateProfileRequest;
use App\Http\Resources\LoggedInUser;
use App\Models\Bus;
use App\Models\Notification;
use App\Models\Photo;
use App\Models\User;
use App\Services\User\AccountVerificationOTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class ProfileController extends Controller
{

    public function profile()
    {
        $user = User::with('license_images')->whereId(auth()->id())->first();
        return apiSuccessMessage("Profile Data", new LoggedInUser($user));
    }
    public function completeProfile(UpdateProfileRequest $request)
    {


        $user = Auth::user();

        if ($request->hasFile('avatar')) {

            $profile_image = $request->avatar->store('public/profile_image');
            $path = Storage::url($profile_image);
            $user->avatar = $path;
        }

        if ($request->hasFile('bus_image') && auth()->user()->role == "driver") {
            $bus_image = $request->bus_image->store('public/bus_image');
            $path = Storage::url($bus_image);

            $bus = Bus::where('driver_id', auth()->id())->first();
            if ($bus) {
                $bus->image = $path;
                $bus->save();
            }
        }

        if ($request->has('first_name'))
            $user->first_name = $request->first_name;

        if ($request->has('last_name'))
            $user->last_name = $request->last_name;

        if ($request->has('phone'))
            $user->phone = $request->phone;

        if ($request->has('address'))
            $user->address = $request->address;

        if ($request->has('driving_license') && auth()->user()->role == "driver")
            $user->driving_license = $request->driving_license;

        if ($request->has('latitude')) {
            $user->latitude = $request->latitude;
        }

        if ($request->has('longitude')) {
            $user->longitude = $request->longitude;
        }

        $user->profile_completed = 1;


        if ($user->save()) {
            $user = User::with('bus')->whereId($user->id)->first();
            return apiSuccessMessage("Profile Updated Successfully", new LoggedInUser($user));
        }

        return commonErrorMessage("Something went wrong", 400);
    }

    public function toggleNotification()
    {

        if (auth()->user()->push_notification  == 1) {
            auth()->user()->push_notification = 0;
            $message = "Off";
        } else {
            auth()->user()->push_notification = 1;
            $message = "On";
        }

        auth()->user()->save();
        return commonSuccessMessage($message);
    }
    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password)) {
            return commonErrorMessage("InCorrect Old password , please try again", 400);
        }

        if (Hash::check($request->new_password, $user->password)) {
            return commonErrorMessage("New Password can not be match to Old Password", 400);
        }

        $user->password = bcrypt($request->new_password);
        $user->save();
        if ($user) {
            return commonSuccessMessage("Password Updated Successfully");
        }
        return commonErrorMessage("Something went wrong while updating old password", 400);
    }

    public function content(Request $request)
    {
        // dd(url("content", $request->slug ));
        return apiSuccessMessage("Content", ['url' => url("content", $request->slug)]);
    }
    public function notifications()
    {
        $notifications = Notification::with('sender:id,first_name,last_name,email,avatar')
            ->select(
                'id',
                'from_user_id',
                'title',
                'description',
                'notification_type',
                'redirection_id',
                'created_at as date',
            )
            ->where('to_user_id', auth()->id())
            ->latest()->get();
        return apiSuccessMessage("Notifications ", $notifications);
    }
}
