<?php

namespace App\Http\Controllers\admin;

use App\Models\Class_;
use App\Models\Lesson;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    public function index()
    {
        $lessons = Lesson::orderBy('class_id', 'desc')->with('teacher', 'class')->get();

        return view('admin.lessons.index', [
            'lessons' => $lessons
        ]);
    }

    public function create()
    {
        $classes = Class_::get();

        $teachers = Teacher::where('is_admin', '=', 0)->get();

        return view('admin.lessons.create', [
            'classes' => $classes,
            'teachers' => $teachers
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'class' => 'required',
            'teacher' => 'required'
        ]);

        Lesson::create([
            'subject' => $request->subject,
            'class_id' => $request->class,
            'teacher_id' => $request->teacher
        ]);

        return redirect()->route('admin.lessons.index')
            ->with('store', 'Pamoka - ' . $request->subject . ' pridėta!');
    }

    public function edit(Lesson $lesson)
    {
        dd('updateView');
    }

    public function update(Lesson $lesson, Request $request)
    {
        dd('updaet');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('admin.lessons.index')
            ->with('destroy', 'Pamoka - ' . $lesson->subject . ' pašalinta!');
    }
}
