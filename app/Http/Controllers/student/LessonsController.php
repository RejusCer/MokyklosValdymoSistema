<?php

namespace App\Http\Controllers\student;

use App\Models\Class_;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LessonsController extends Controller
{
    public function index()
    {
        $lessons = Lesson::where('class_id', '=', Auth::guard('student')->user()->class__id)->get();

        return view('student.lessons.index', [
            'lessons' => $lessons
        ]);
    }

    // public function viewStudents(Lesson $lesson)
    // {
    //     $students = Student::where('class__id', '=', $lesson->class_id)->get();
        
    //     return view('viewLesson', [
    //         'students' => $students,
    //         'lesson' => $lesson
    //     ]);
    // }
}
