<?php

namespace App\Http\Controllers\teacher;

use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradesController extends Controller
{
    public function index(Lesson $lesson, Student $student)
    {
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

        return view('teacher.grades.index', [
            'grades' => $grades,
            'lesson' => $lesson,
            'student' => $student,
            'avarage' => $avarage
        ]);
    }

    public function add(Lesson $lesson, Student $student, Request $request)
    {
        Grade::create([
            'grade' => $request->grade,
            'student_id' => $student->id,
            'lesson_id' => $lesson->id
        ]);

        return redirect()->back()->with('store', 'Pažymys [' . $request->grade . '] įrašytas');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->back()->with('delete', 'Pažymys ištrintas');
    }
}
