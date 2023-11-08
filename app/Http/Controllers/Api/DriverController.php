<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AttendanceStatus;
use App\Models\User;
use App\Services\Notifications\CreateDBNotification;
use App\Services\Notifications\PushNotificationService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DriverController extends Controller
{

    public function stepsData()
    {
        return apiSuccessMessage("success", ['last_end_point' => Cache::get('user_' . auth()->id())]);
    }

    public function getDroppOffChilds(Request $request)
    {

        $this->validate($request, [
            'type' => 'required|in:dropped_off,picked_up'
        ]);

        $type = $request->type;
        Cache::put('user_' . auth()->id(), $type, 600);
        $users =  User::with('school:id,first_name,email,avatar')
            ->select(
                'users.id',
                'first_name',
                'last_name',
                'avatar',
                'email',
                'school_id'
            )
            ->selectRaw('attendance_statuses.status,attendance_statuses.id as status_id')
            ->join('attendance_statuses', 'users.id', 'attendance_statuses.user_id')
            ->when($type == "dropped_off", function ($dropped_off) {
                return $dropped_off
                    ->whereRaw('date = CURDATE() AND status = "going" AND home_pickup_time IS NOT NULL
                                                            AND school_drop_off_time IS NULL AND home_drop_off_time IS NULL');
            })
            ->when($type == "picked_up", function ($pick_up) {
                return $pick_up
                    ->whereRaw('date = CURDATE() AND status = "going" AND home_pickup_time IS NOT NULL
                                                        AND school_drop_off_time IS NOT NULL AND home_drop_off_time IS NULL AND school_pick_up_time IS NULL');
            })
            ->where('driver_id', auth()->id())
            // ->groupBy('users.id','first_name','last_name','users.avatar','users.email','status')
            ->get();
        return apiSuccessMessage("Data", $users);
    }
    public function getDriverChilds(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|in:home_to_school,school_to_home',
            'date' => 'required',
        ]);

        $type = $request->type;
        $date = $request->date;
        Cache::put('user_' . auth()->id(), $type, 600);
        $school = User::select('id', 'first_name', 'latitude', 'longitude')->whereId(auth()->user()->school_id)->first();
        $students = User::with(['parent_childs' => function ($childs) use ($type, $date) {
            return $childs->where('driver_id', auth()->id())
                ->selectRaw('attendance_statuses.status,attendance_statuses.id as status_id, picked_by_parent')
                ->join('attendance_statuses', 'users.id', 'attendance_statuses.user_id')
                ->when($type == "home_to_school", function ($home_to_school) use ($date) {
                    return $home_to_school
                        ->whereRaw('date = "' . $date . '" AND status in ("going","notgoing") AND home_pickup_time IS NULL ');
                })
                ->when($type == "school_to_home", function ($school_to_home) use ($date) {
                    return $school_to_home
                        ->whereRaw('date = "' . $date . '" AND status = "going" AND home_pickup_time IS NOT NULL
                                                            AND school_drop_off_time IS NOT NULL AND school_pick_up_time IS NOT NULL AND home_drop_off_time IS NULL');
                })
                ->groupBy(
                    'users.id',
                    'parent_id',
                    'driver_id',
                    'school_id',
                    'first_name',
                    'last_name',
                    'avatar',
                    'email',
                    'class',
                    'roll_number',
                    'gender',
                    'dob',
                    'shift_start_time',
                    'shift_end_time',
                    'status',
                    'status_id',
                    'picked_by_parent'
                );
        }])->select('id', 'first_name', 'last_name', 'avatar', 'latitude', 'longitude')
            ->whereRaw(' id in (select parent_id from users where driver_id = "' . auth()->id() . '")')

            ->get();


        $filteredResults = $students->filter(function ($mainObject) {
            return $mainObject['parent_childs']->contains(function ($child) {
                return $child['status'] === 'going' && $child['picked_by_parent'] == 0;
            });
        })->values();
        return apiSuccessMessage("Success", ['childs' => $filteredResults, 'school' => $school]);
    }

    public function driverUpdateChildStatus(Request $request)
    {
        $this->validate($request, [
            'status_id' => 'required|exists:attendance_statuses,id',
            'type' => 'required|in:home_to_school,school_drop_off,school_pick_up,home_drop_off',
            // 'picked_by_parent_ids' => 'required_if:type,==school_pick_up',
        ]);

        $type = $request->type;
        $current_time = Carbon::now();

        $attendance_status = AttendanceStatus::whereIn('id', $request->status_id);
        $childIds = $attendance_status->pluck('user_id');

        $data =  $this->getParentsDeviceTokensAndChilds($childIds);
        $message = "";
        $notification_type = "";

        if ($type == "home_to_school") {
            $message = " has been picked up by " . auth()->user()->first_name . " " . auth()->user()->last_name . " from home";
            $notification_type = "HOME_PICK_UP";
            $attendance_status->update(['home_pickup_time' => $current_time]);
        }

        if ($type == "school_drop_off") {
            $message = " has been dropped off at school by " . auth()->user()->first_name . " " . auth()->user()->last_name;
            $notification_type = "SCHOOL_DROP_OFF";

            $attendance_status->update(['school_drop_off_time' => $current_time]);
        }

        if ($type == "school_pick_up") {
            $attendance_status->update(['school_pick_up_time' => $current_time]);
            $message = " has been picked up by " . auth()->user()->first_name . " " . auth()->user()->last_name . " from school";
            $notification_type = "SCHOOL_PICK_UP";

            if ($request->has('picked_by_parent_ids')) {
                AttendanceStatus::whereIn('id', $request->picked_by_parent_ids)
                    ->update(['school_pick_up_time' => $current_time, 'picked_by_parent' => true]);
            }
        }

        if ($type == "home_drop_off") {
            $message = " has been dropped off at home by " . auth()->user()->first_name . " " . auth()->user()->last_name;
            $notification_type = "HOME_DROP_OFF";

            $attendance_status->update(['home_drop_off_time' => $current_time]);
        }

        $this->sendNotifications(auth()->id(), auth()->id(), $notification_type, $message, $data);

        return commonSuccessMessage("Success.");
    }

    protected function getParentsDeviceTokensAndChilds($childIds)
    {
        $ids = User::whereIn('id', $childIds)->pluck('parent_id')->unique();
        return
            User::with('parent_childs:id,parent_id,first_name,last_name')
            ->whereIn('id', $ids)->get(['id', 'device_token', 'push_notification']);
    }

    public function childsCount()
    {
        return apiSuccessMessage("success", ['childs_count' => User::whereDriverId(auth()->id())->whereRole('child')->count()]);
    }


    public function sendNotifications($from_user_id, $redirection_id,  $notification_type, $message, $receiver_data)
    {

        foreach ($receiver_data as $parent) {

            foreach ($parent->parent_childs as $child) {
                $data = [
                    'from_user_id' => $from_user_id,
                    'notification_type' => $notification_type,
                    'redirection_id' => $redirection_id,
                    'title' => $child->first_name . " " . $child->last_name .  $message,
                    'description' => $child->first_name . " " . $child->last_name .  $message,
                    'to_user_id' => $parent?->id,
                ];

                app(CreateDBNotification::class)->execute($data);

                // Here we will send push notifications
                if ($parent->device_token && $parent->push_notification) {
                    app(PushNotificationService::class)->execute($data, [$parent->device_token]);
                }
            }
        }

        return true;
    }

    public function getParents()
    {
        $parents = User::select('id', 'first_name', 'last_name', 'email', 'phone', 'address', 'avatar')
            ->whereRaw('( id in (select parent_id from users where users.driver_id = "' . auth()->id() . '" and users.role = "child") )')
            ->get();

        return apiSuccessMessage("Parents", $parents);
    }

    public function studentsAttendanceDateWise(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
        ]);

        $users = User::join('attendance_statuses', 'attendance_statuses.user_id', 'users.id')
            ->select('users.id', 'first_name', 'last_name', 'email', 'avatar', 'status')
            ->where('driver_id', auth()->id())
            ->where('attendance_statuses.date', $request->date)
            ->whereIn('status', ["going", "notgoing", "leave"])
            ->groupBy('users.id')
            ->get();
        return apiSuccessMessage("Success", $users);
    }
    public function absentStudentDates(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'child_id' => 'required'
        ]);
        $convertedDate = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
        // $student_ids = User::whereParentId(auth()->id())->whereIsApproved(1)->pluck('id');
        $student_ids = $request->child_id;

        $dates = AttendanceStatus::whereYear('date', Carbon::parse($convertedDate)->year)
            ->whereMonth('date', Carbon::parse($convertedDate)->month)
            ->where('user_id', $student_ids)
            ->whereStatus('notgoing')
            ->selectRaw("DATE_FORMAT(STR_TO_DATE(date, '%Y-%m-%d'), '%m/%d/%Y') AS date")
            ->pluck('date');
        return apiSuccessMessage("Dates", $dates);
    }

    public function notify(Request $request)
    {
        $this->validate($request, [
            'notify_type' => 'required|in:yes,no'
        ]);

        $type = $request->notify_type;
        $data = [
            'from_user_id' => auth()->id(),
            // 'to_user_id' => auth()->id(),
            // 'title' => $message,
            // 'description' => $message,
            'notification_type' => "PICK_UP_ALERT",
            'redirection_id' => auth()->id(),
        ];

        $users = User::select('id', 'device_token')
            ->whereRaw(' id in (select parent_id from users where driver_id = "' . auth()->id() . '")')
            ->get();

        if ($type == "yes") {
            $message = auth()->user()->first_name . " " . auth()->user()->last_name . " is going to pick children";
            $data['title'] = $message;
            $data['description'] = $message;
            foreach ($users as $user) {
                $data['to_user_id'] = $user->id;
                app(CreateDBNotification::class)->execute($data);
            }

            return commonSuccessMessage("Notified");
        }


        $message = auth()->user()->first_name . " " . auth()->user()->last_name . " is not available.";
        $data['title'] = $message;
        $data['description'] = $message;
        $data['notification_type'] = 'NOT_PICK_UP_ALERT';

        foreach ($users as $user) {
            $data['to_user_id'] = $user->id;
            app(CreateDBNotification::class)->execute($data);
        }

        return commonSuccessMessage("Notified");
    }
}
