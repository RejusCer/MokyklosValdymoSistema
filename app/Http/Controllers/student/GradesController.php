<?php

namespace App\Http\Controllers\student;

use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GradesController extends Controller
{
    public function index(Lesson $lesson)
    {
        $student = Auth::guard('student')->user();
        $avarage = 0;
        $grades = Grade::where('lesson_id', '=', $lesson->id)->where('student_id', '=', $student->id)->get();

        if ($grades->count() != 0)
        {
            foreach ($grades as $grade)
            {
                $avarage += $grade->grade;
            }
            $avarage = $avarage / $grades->count();
        }

        return view('student.grades.index', [
            'grades' => $grades,
            'lesson' => $lesson,
            'student' => $student,
            'avarage' => $avarage
        ]);
    }
}
