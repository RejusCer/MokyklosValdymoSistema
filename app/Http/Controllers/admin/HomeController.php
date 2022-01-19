<?php

namespace App\Http\Controllers\admin;

use App\Models\Class_;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $teacherCount = Teacher::count();
        $studentCount = Student::count();
        $classesCount = Class_::count();
        $lessonsCount = Lesson::count();

        return view('admin.home',[
            'teacherCount' => $teacherCount,
            'studentCount' => $studentCount,
            'classesCount' => $classesCount,
            'lessonsCount' => $lessonsCount
        ]);
    }
}
