<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'date',
        'home_pickup_time',
        'home_drop_off_time',
        'school_pick_up_time',
        'school_drop_off_time',
        'picked_by_parent'
    ];
}
