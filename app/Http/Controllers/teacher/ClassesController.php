<?php

namespace App\Http\Controllers\teacher;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClassesController extends Controller
{
    public function index()
    {
        if (Auth::guard('teacher')->user()->class_)
        {
            $students = Student::where('class__id', '=', Auth::guard('teacher')->user()->class_->id)->get();
        }
        else 
        {
            $students = null;
        }

        return view('teacher.classes.index', [
            'students' => $students,
        ]);
    }
}
