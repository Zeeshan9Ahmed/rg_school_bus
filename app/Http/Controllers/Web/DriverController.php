<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddDriverRequest;
use App\Models\Bus;
use App\Models\User;
use Illuminate\Http\Request;


class DriverController extends Controller
{

    public function updateDriverProfile(Request $request)  {
        // return $request->all();
        User::whereId($request->driver_id)->update($request->only(['first_name','last_name','phone','driving_license']));

        return commonSuccessMessage("Profile updated successfully.");
    }

    public function drivers () {
        
        $buses = Bus::where('school_id', auth()->id())->whereNull('driver_id')->latest()->get();
        $drivers = User::has('driver_bus')
                        ->with('driver_bus')
                        ->select('id','first_name','last_name','avatar','email')
                        ->withCount('driver_childs')
                        ->where(['role' => 'driver', 'school_id' => auth()->id()])
                        ->get();
        // return $drivers;
        return view('school.driver.list', compact('buses','drivers'));
        
    }

    public function driverDetail ($driver_id) {
        
        $driver = User::with('driver_bus','driver_childs.parent')
                        ->select('id','first_name','last_name','avatar','email','phone','driving_license')
                        // ->withCount('driver_childs')
                        ->whereId($driver_id)
                        ->firstOrFail();
        // return $driver;
        return view('school.driver.details',compact('driver'));

    }

    public function addDriver (AddDriverRequest $request) {

       $driver_id = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'school_id' => auth()->id(),
            'role' => 'driver',
        ])->id;

        Bus::whereId($request->bus_id)->update(['driver_id' => $driver_id]);
        return commonSuccessMessage('Driver added successfully.');
    }
    
    public function buses () {
        $buses = Bus::where('school_id', auth()->id())->latest()->get();

        return view('school.bus.list', compact('buses'));
    }

    public function bus (Request $request) {
        $data = $request->only(['registration_number','seating_capacity']) +['school_id' => auth()->id()];
        
        Bus::create($data);

        return commonSuccessMessage("Bus added successfully");
    }
}
