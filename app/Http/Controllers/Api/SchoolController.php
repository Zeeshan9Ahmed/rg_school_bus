<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddChildRequest;
use App\Http\Requests\GetSchoolsRequest;
use App\Models\User;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function schools(GetSchoolsRequest $request)
    {
        $schools = User::select('id', 'first_name', 'email', 'avatar', 'address', 'phone')
            ->where('role', 'school')
            ->when($request->type == "my", function ($query) {
                return $query->whereRaw(' id in (select school_id from users
                                                where parent_id = "' . auth()->id() . '" AND is_approved =1)');
            })
            ->get();
        return apiSuccessMessage("Schools", $schools);
    }

    public function addChild(AddChildRequest $request)
    {
        $data =  $request->only(['school_id', 'first_name', 'last_name', 'class', 'roll_number', 'gender', 'dob']) + ['parent_id' => auth()->id(), 'role' => 'child'];
        // return $data;
        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('/uploadedimages'), $imageName);
            $avatar = "/uploadedimages/" . $imageName;
            $data['avatar'] = $avatar;
        }

        User::create($data);

        return commonSuccessMessage("Request sent successfully");
    }

    public function pendingRequests()
    {
        $users = User::with('school:id,first_name as school_name')
            ->select('id', 'school_id', 'first_name', 'last_name', 'avatar', 'class', 'roll_number', 'gender', 'dob')
            ->where(['parent_id' => auth()->id(), 'is_approved' => 0, 'role' => 'child'])
            ->get();
        return apiSuccessMessage("Pending requests", $users);
    }
}
