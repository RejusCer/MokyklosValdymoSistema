<?php

namespace App\Http\Controllers\admin;

use App\Models\Class_;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Class_::orderBy('id')->with('teacher', 'student')->get();

        return view('admin.classes.index', [
            'classes' => $classes,
        ]);
    }

    public function create()
    {
        // paima visus mokytojus kurie nera administratoriai ir nėturi paskirtos klasės
        $takenTeachers = Class_::get('teacher_id');
        $teachers = [];

        foreach (Teacher::where('is_admin', '=', false)->get() as $teacher)
        {
            // pažiūrėti ar mokytojas turi klasė
            $hasClass = false;
            foreach ($takenTeachers as $key => $takenTeacher)
            {
                if ($teacher->id === $takenTeachers[$key]->teacher_id)
                {
                    $hasClass = true;
                }
            }

            if ($hasClass !== true)
            {
                array_push($teachers, $teacher);
            }
        }

        return view('admin.classes.create', [
            'teachers' => $teachers,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'teacher_id' => 'required'
        ]);

        Class_::create([
            'id' => $request->id,
            'teacher_id' => $request->teacher_id
        ]);

        return redirect()->route('admin.classes.index')
            ->with('store', 'Klasė - ' . $request->id . ' pridėta!');
    }

    public function edit(Class_ $class)
    {
        $takenTeachers = Class_::get('teacher_id');
        $teachers = [];

        foreach (Teacher::where('is_admin', '=', false)->get() as $teacher)
        {
            $hasClass = false;
            foreach ($takenTeachers as $key => $takenTeacher)
            {
                if ($teacher->id === $takenTeachers[$key]->teacher_id)
                {
                    $hasClass = true;
                }
            }
            if ($hasClass !== true)
            {
                array_push($teachers, $teacher);
            }
        }

        return view('admin.classes.update', [
            'class' => $class,
            'teachers' => $teachers
        ]);
    }

    public function update(Class_ $class, Request $request)
    {
        $class->teacher_id = $request->teacher_id;

        $class->save();

        return redirect()->route('admin.classes.index')
            ->with('update', 'Klasė - ' . $class->id . ' atnaujinta!');
    }

    public function destroy(Class_ $class)
    {
        $class->delete();

        return redirect()->route('admin.classes.index')
            ->with('destroy', 'Klasė - ' . $class->id . ' ištrinta!');
    }
}
