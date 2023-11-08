<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['service'];

    public function vehicles () {
        return $this->hasMany(Vehicle::class,'service_id','id');
    }
}
