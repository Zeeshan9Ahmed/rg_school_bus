<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'school_id',
        'driver_id',
        'parent_id',
        'password',
        'first_name',
        'last_name',
        'avatar',
        'profile_completed',
        'device_type',
        'device_token',
        'password',
        'role',
        'email_verified_at',
        'push_notification',
        'latitude',
        'longitude',
        'is_active',
        'address',
        'signin_mode',
        'dob',
        'social_token',
        'class',
        'gender',
        'dob',
        'roll_number',
        'shift_start_time',
        'shift_end_time',
        'phone',
        'driving_license'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function school()
    {
        return $this->belongsTo(User::class, 'school_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id', 'id')->select('id', 'first_name', 'last_name', 'email', 'avatar');
    }



    public  function childs()
    {
        return $this->hasMany(User::class, 'parent_id', 'id')
            ->select('id', 'parent_id', 'driver_id', 'school_id', 'first_name', 'last_name', 'avatar', 'email', 'class', 'roll_number', 'gender', 'dob', 'shift_start_time', 'shift_end_time')
            ->addSelect(DB::raw('(YEAR(CURDATE()) - YEAR(STR_TO_DATE(dob, "%m/%d/%Y"))) as total_years'))
            ->where(['school_id' => auth()->id(), 'is_approved' => 1]);
    }

    public  function parent_childs()
    {
        return $this->hasMany(User::class, 'parent_id', 'id')
            ->select('users.id', 'parent_id', 'driver_id', 'school_id', 'first_name', 'last_name', 'avatar', 'email', 'class', 'roll_number', 'gender', 'dob', 'shift_start_time', 'shift_end_time')
            ->addSelect(DB::raw('(YEAR(CURDATE()) - YEAR(STR_TO_DATE(dob, "%m/%d/%Y"))) as total_years'))
            ->where(['is_approved' => 1]);
    }
    public  function driver_childs()
    {
        return $this->hasMany(User::class, 'driver_id', 'id')
            ->select('id', 'parent_id', 'driver_id', 'school_id', 'first_name', 'last_name', 'avatar', 'email', 'class', 'roll_number', 'gender', 'dob')
            ->addSelect(DB::raw('(YEAR(CURDATE()) - YEAR(STR_TO_DATE(dob, "%m/%d/%Y"))) as total_years'))

            // ->where(['school_id' =>5 ,'is_approved' => 1])
        ;
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }

    public function driver_bus()
    {
        return $this->hasOne(Bus::class, 'driver_id', 'id')
            ->select('id', 'driver_id', 'image', 'registration_number', 'seating_capacity')
            ->where('school_id', auth()->id());
    }
    public function bus()
    {
        return $this->hasOne(Bus::class, 'driver_id', 'id')
            ->select('id', 'driver_id', 'image', 'registration_number', 'seating_capacity');
    }

    public function school_drivers()
    {
        return $this->hasMany(User::class, 'school_id', 'id')->select('id', 'first_name', 'last_name', 'avatar', 'email', 'school_id')
            ->whereRole('driver');
    }
}
