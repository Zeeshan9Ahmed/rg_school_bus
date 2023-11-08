<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function students () {
        $students = User::with('driver:id,first_name,last_name','parent')->
                        where('school_id', auth()->id())
                        ->where(['role' => 'child', 'is_approved' => 1])
                        ->select('id','parent_id','driver_id','first_name','last_name','email')
                        ->get();
                        // return $students;
                        return view('school.student.list',compact('students'));
                    }
                    
                    public function studentDetail ($student_id) {
                        $student = User::with('driver:id,first_name,last_name','parent')
                        ->where('school_id', auth()->id())
                        ->where('id', $student_id)
                        ->where(['role' => 'child', 'is_approved' => 1])
                        // ->where('role','child')
                        ->select('id','parent_id','driver_id','first_name','last_name','email','class','roll_number')
                        ->firstOrFail();
        // return $student;
        return view('school.student.details', compact('student'));

    }
}
