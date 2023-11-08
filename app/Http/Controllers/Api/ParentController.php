<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateChildProfileRequest;
use App\Models\User;
use App\Services\Notifications\PushNotificationService;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function parentList(Request $request)
    {
        $SchoolID = session('SchoolID');
        // dd($SchoolID, auth()->id());
        $parents = User::select('id', 'first_name', 'last_name', 'email', 'avatar')->withCount('childs')->having('childs_count', '>', 0)->get();
        //dd($records->toArray());
        // return $parents;
        return view('school.parent.list', compact('parents'));
    }

    public function parentRequests()
    {
        // return "Helee";
        $students = User::with('parent:id,first_name,last_name,avatar')
            ->select('id', 'first_name', 'last_name', 'avatar', 'gender', 'roll_number', 'class', 'dob', 'parent_id')
            ->where(['role' => 'child', 'school_id' => auth()->id(), 'is_approved' => 0])->get();
        // return $records;
        // return $students;
        return view('school.parent.view-requests', compact('students'));
    }

    public function parentDetail($parent_id)
    {
        // dd($parent_id);
        $parent = User::with('childs.driver:id,first_name,last_name,avatar')
                    ->select('id', 'first_name', 'last_name', 'email', 'avatar')
                    ->where('id', $parent_id)
                    ->first();
        // return $parent;
        $drivers = User::select('id', 'first_name', 'last_name', 'avatar')
            ->where(['school_id' => auth()->id(), 'role' => 'driver'])
            ->get();
        return view('school.parent.details', compact('parent','drivers'));
    }


    public function updateChild (UpdateChildProfileRequest $request) {
        $timestamp = strtotime($request->age);
        $formattedDate = date('m/d/Y', $timestamp);
        
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'class' => $request->child_class,
            'dob' => $formattedDate,
            'driver_id' => $request->driver_id,
            'roll_number' => $request->roll_number,
            'shift_start_time' => $request->shift_start_time,
            'shift_end_time' => $request->shift_end_time,
        ];

        User::where('id', $request->child_id)->update($data);
        return commonSuccessMessage("Child profile updated successfully.");
    }
    public function drivers()
    {
        $drivers = User::select('id', 'first_name', 'last_name', 'avatar')
            ->where(['school_id' => auth()->id(), 'role' => 'driver'])
            ->get();
        return apiSuccessMessage("Success", $drivers);
    }

    public function approveRequest(Request $request)
    {
        
        User::where('id', $request->child_id)->update(['driver_id' => $request->driver_id, 'is_approved' => 1]);
        
        $parent = User::where('id', $request->parent_id)->select('id','is_approved', 'device_token','push_notification')->first();
        
        if ($parent->is_approved == 0 ) {
            $parent->is_approved = 1;
            $parent->save();
        }
        
        $driver = User::whereId($request->driver_id)->select('id', 'device_token','push_notification')->first();
        
        
        $data = [
            'from_user_id' => auth()->id(),
            'notification_type' => "NEW_CHILD",
            'redirection_id' => auth()->id(),
        ];
        $message = "Child request has been approved.";
        $data['to_user_id'] = $parent?->id;
        $data['title'] = $message;
        $data['description'] = $message;
        $parent_token = $parent->device_token;
        if ($parent_token && $parent->push_notification) {
            app(PushNotificationService::class)->execute($data,[$parent_token]);
        }
        
        // app(CreateDBNotification::class)->execute($data);


        $message = "A new Child has been assigned to you.";
        $data['to_user_id'] = $driver?->id;
        $data['title'] = $message;
        $data['description'] = $message;
        
        $driver_token = $driver->device_token;
        if ($driver_token && $driver->push_notification) {
            app(PushNotificationService::class)->execute($data,[$driver_token]);
        }
        // app(CreateDBNotification::class)->execute($data);
        
        
        return commonSuccessMessage("Request approved successfully");
    }

    public  function disapproveRequest(Request $request)
    {
        User::where('id', $request->child_id)->delete();
        $child_count = User::where('parent_id', $request->parent_id)->count();
        if ($child_count < 1) {
            User::where('id', $request->parent_id)->update(['is_approved' => 0]);
        }
        return commonSuccessMessage("Request rejected successfully");
    }
}
