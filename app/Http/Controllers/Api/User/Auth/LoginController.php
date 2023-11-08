<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\Auth\LoginRequest;
use App\Http\Requests\Api\User\Auth\SocialLoginRequest;
use App\Http\Resources\LoggedInUser;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        
        if ( Auth::attempt(['email' => $request->email, 'password' => $request->password]) )
        {
            $user = Auth::user();

            if ( $user->email_verified_at == null)
            {
                return commonErrorMessage("Account not verified Please Verify your account", 400);
            }
            
            $user->device_type = $request->device_type;
            $user->device_token = $request->device_token;
            $user->save();
            // $user->tokens()->delete();
            // $token =$user->createToken('authToken')->plainTextToken;
            $url = 'test';
            return apiSuccessMessage("User login Successfully", new LoggedInUser($user, $url), '$token');
        }

        return commonErrorMessage("Invalid Credientials", 400);
    }

    public function logout()
    {
        $user = Auth::user();
        $user->tokens()->delete();
        $user->device_type = null;
        $user->device_token = null;
        $user->save();
        
        return commonSuccessMessage('Log Out Successfully');

    }
    public function socialAuth(SocialLoginRequest $request) 
    {
        if ($request->signin_mode == 'phone') {
            // return $this->phoneSignIn($request);
        }
        $user = User::where(['social_token' => $request->social_token , 'social_type' => $request->social_type])->first();
        
        if(!$user) {
            $user = new User();
            $user->social_token = $request->social_token;
            $user->social_type = $request->social_type;
            $user->is_social = 1;
        }

        if(!$user->email_verified_at){
            $user->email_verified_at = Carbon::now();
        }
        
        // $user->signin_mode = 'social';

        $user->device_type = $request->device_type;
        $user->device_token = $request->device_token;
        $user->save();
        $user = User::whereId($user->id)->first();

        $user->tokens()->delete();
        $token = $user->createToken('authToken')->plainTextToken;
        
        return apiSuccessMessage("login Successfully", new LoggedInUser($user), $token);
        
    }

    public function phoneSignIn($user_data) {
        // return $user->phone;
        $user = User::where(['phone' => $user_data->phone ])->first();
        if(!$user){
            $user = new User();
            $user->social_token = $user_data->social_token;
            $user->social_type = $user_data->social_type;
            $user->phone = $user_data->phone;
            $user->is_social = 1;
            $user->save();
            $user = User::whereId($user->id)->first();
        }

        if(!$user->phone_verified_at){
            $user->phone_verified_at = Carbon::now();
        }
        
        $user->signin_mode = 'phone';
        $user->device_type = $user_data->device_type;
        $user->device_token = $user_data->device_token;
        $user->save();
        $user = User::whereId($user->id)->first();
        $user->tokens()->delete();
        $token = $user->createToken('authToken')->plainTextToken;

        return apiSuccessMessage("login Successfully", new LoggedInUser($user), $token);


    }


    public function hanan (Request $request) {
        $apiKey = 'AIzaSyBmaS0B0qwokES4a_CiFNVkVJGkimXkNsk';
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $waypoints = $request->input('waypoints', []);
        $origin = $request->input('origin', 'Park Avenue, Shahrah-e-Faisal Road, Pakistan Employees Co-Operative Housing Society Block 6 PECHS, Karachi');
        $destination = $request->input('destination', 'Park Avenue, Shahrah-e-Faisal Road, Pakistan Employees Co-Operative Housing Society Block 6 PECHS, Karachi');

        $waypoints = [
            "University of Karachi, KU Circular Road, Karachi",
            "Defence view Phase 2 Defence View Housing Society, Karachi",
            "Tariq Center, Tariq Road, Pakistan Employees Co-Operative Housing Society Block 2 PECHS, Karachi",
            "Model Colony Malir, Karachi",
            "Rabia City Block 18 Gulistan-e-Johar, Karachi",
            // Add more waypoints as needed
        ];
        $client = new Client();
        $response = $client->get('https://maps.googleapis.com/maps/api/directions/json', [
            'query' => [
                'key' => $apiKey,
                'origin' => $origin,
                'destination' => $destination,
                'waypoints' => implode('|', $waypoints),
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        if ($data['status'] === 'OK') {
            // Extract the best route, distance, and duration here
            $bestRoute = $data['routes'][0];
            $distance = $bestRoute['legs'][0]['distance']['text'];
            $duration = $bestRoute['legs'][0]['duration']['text'];
            return [$bestRoute, $distance, $duration] ;
        }
    }
}
