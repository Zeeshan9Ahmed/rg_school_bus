<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetChildsRequest;
use App\Http\Requests\UpdateChildProfileRequest;
use App\Models\AttendanceStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function updateChild(UpdateChildProfileRequest $request)
    {
        $timestamp = strtotime($request->dob);
        $formattedDate = date('m/d/Y', $timestamp);

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'class' => $request->child_class,
            'dob' => $formattedDate,
            'roll_number' => $request->roll_number,
        ];

        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('/uploadedimages'), $imageName);
            $avatar = "/uploadedimages/" . $imageName;
            $data['avatar'] = $avatar;
        }

        User::where('id', $request->child_id)->update($data);
        return commonSuccessMessage("Child profile updated successfully.");
    }

    public function childs(GetChildsRequest $request)
    {
        $users = User::with('school:id,first_name as school_name')
            ->select('id', 'school_id', 'first_name', 'last_name', 'avatar', 'class', 'roll_number', 'gender', 'dob', 'shift_start_time', 'shift_end_time')
            ->where(['parent_id' => $request->parent_id, 'is_approved' => 1, 'role' => 'child'])
            ->when($request->has('school_id'), function ($school) use ($request) {
                return $school->where('school_id', $request->school_id);
            })
            ->get();
        return apiSuccessMessage("Childs", $users);
    }


    public function travelHistory(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
        ]);

        $travel_history = AttendanceStatus::select(
            'id',
            'picked_by_parent',
        )
            ->selectRaw("
                                                DATE_FORMAT(STR_TO_DATE(date, '%Y-%m-%d'), '%b-%d-%Y') as date,
                                                TIME_FORMAT(home_pickup_time, '%h:%i %p') AS home_pick_up_time,
                                                TIME_FORMAT(home_drop_off_time, '%h:%i %p') AS home_drop_off_time,
                                                TIME_FORMAT(school_pick_up_time, '%h:%i %p') AS school_pick_up_time,
                                                TIME_FORMAT(school_drop_off_time, '%h:%i %p') AS school_drop_off_time
                                            ")
            ->where('user_id', $request->user_id)
            ->where('status', 'going')
            ->orderByDesc('date')
            ->get();

        return apiSuccessMessage("History", $travel_history);
    }
    public function childAttendanceStatus(Request $request)
    {


        $this->validate($request, [
            'date' => 'date|after_or_equal:today',
            'type' => 'required|in:going,notgoing,leave',
            'start_date' => 'required_if:type,==,leave|after_or_equal:today',
            'end_date' => 'required_if:type,==,leave',
            'user_id' => 'required|exists:users,id',
        ]);

        $type = $request->type;

        if ($type == "leave") {
            $dates = $this->removeWeekendsBetweenDates($request->start_date, $request->end_date);
            return $this->applyForLeaves($request->user_id, $dates);
            return "";
        }

        $date =  Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');

        AttendanceStatus::updateOrCreate(
            ['user_id' => $request->user_id, 'date' => $date],
            [
                'status' => $request->type
            ]
        );

        return commonSuccessMessage("Success");
    }

    public function dashboard()
    {
        $user_id =  auth()->id();

        $users = User::whereParentId($user_id)->whereIsApproved(1);
        $schoolIds = $users->pluck('school_id');

        $driverIds = $users->pluck('driver_id');

        $data = User::has('school_drivers.driver_childs')
            ->with([
                'school_drivers' => function ($driver) use ($driverIds) {
                    return $driver->whereIn('id', $driverIds);
                },
                'school_drivers.bus',
                'school_drivers.driver_childs' => function ($query) use ($user_id) {
                    return $query->selectRaw('(select status from attendance_statuses where date = CURDATE() AND user_id = users.id LIMIT 1) as status')
                        ->where('parent_id', $user_id);
                },
            ])
            ->select('id', 'first_name as school_name', 'latitude', 'longitude', 'avatar')
            ->where('role', 'school')
            ->whereIn('id', $schoolIds)
            ->get();

        return apiSuccessMessage("Success", $data);
    }

    public  function deleteChild(Request $request)
    {
        User::where('id', $request->child_id)->delete();
        $child_count = User::where('parent_id', auth()->id())->count();
        if ($child_count < 1) {
            User::where('id', $request->parent_id)->update(['is_approved' => 0]);
        }
        return commonSuccessMessage("Success");
    }

    public function requestStatus()
    {

        $status = User::selectRaw('(
                                    CASE WHEN(SELECT COUNT(id) from users where parent_id = "' . auth()->id() . '") > 0 then 1 ELSE 0 END

                                    ) as is_requested,
                                    (CASE WHEN(SELECT COUNT(id) from users where parent_id = "' . auth()->id() . '" AND is_approved = 1) > 0 then 1 ELSE 0 END) as is_approved
                                    ')->first();
        return apiSuccessMessage(".", $status);
    }

    public function applyForLeaves($user_id, $dates)
    {
        DB::beginTransaction();
        try {
            //code...
            foreach ($dates as $date) {
                AttendanceStatus::updateOrCreate(
                    ['user_id' => $user_id, 'date' => $date],
                    [
                        'status' => "leave"
                    ]
                );
            }

            DB::commit();
            return commonSuccessMessage("Applied for leave successfully.");
        } catch (\Throwable $th) {
            //throw $th;

            DB::rollback();
            return commonErrorMessage("Something went wrong while applying for leave", 400);
        }
    }

    public function removeWeekendsBetweenDates($startDate, $endDate)
    {
        // $inputStartDate = "08/12/2023";
        // $inputEndDate = "08/20/2023";

        $startDate = Carbon::createFromFormat('m/d/Y', $startDate);
        $endDate = Carbon::createFromFormat('m/d/Y', $endDate);

        $dates = [];

        while ($startDate->lte($endDate)) {
            if (!$startDate->isWeekend()) {
                $dates[] = $startDate->copy()->format('Y-m-d');
            }
            $startDate->addDay();
        }

        return $dates;
    }
}
