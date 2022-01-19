<?php

namespace App\Http\Controllers\teacher;

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
        $lessons = Lesson::where('teacher_id', '=', Auth::guard('teacher')->user()->id)->get();

        return view('teacher.lessons.index', [
            'lessons' => $lessons
        ]);
    }

    public function viewStudents(Lesson $lesson)
    {
        $students = Student::where('class__id', '=', $lesson->class_id)->get();
        
        return view('teacher.lessons.viewLesson', [
            'students' => $students,
            'lesson' => $lesson
        ]);
    }

    public function update(Lesson $lesson, Request $request)
    {
        dd('updaet');
    }
}
