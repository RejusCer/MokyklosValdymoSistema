<?php

namespace App\Http\Controllers\admin;

use App\Models\Class_;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::paginate(20);

        return view('admin.students.index', [
            'students' => $students
        ]);
    }

    // Studentų search box AJAX
    public function search(Request $request)
    {
        $search = $request->searchText;

        $students = Student::where("first_name", "like", $search . "%")->paginate(20);

        return view('components.Table.student_search', [
            'students' => $students
        ]);
    }

    public function create()
    {
        $classes = Class_::get();

        return view('admin.students.create', [
            'classes' => $classes
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students',
            'tel_number' => 'required',
            'password' => 'required|min:3'
        ]);

        Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'tel_number' => $request->tel_number,
            'date_of_birth' => $request->date_of_birth,
            'password' => Hash::make($request->password),
            'class__id' => $request->class_id,
        ]);

        return redirect()->route('admin.students.index')
            ->with('store', 'Studentas - ' . $request->first_name . ' ' . $request->last_name . ' pridėtas!');
    }

    public function edit(Student $student)
    {
        return view('admin.students.update', [
            'student' => $student,
        ]);
    }

    public function update(Student $student, Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'tel_number' => 'required',
            'date_of_birth' => 'required'
        ]);

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->tel_number = $request->tel_number;
        $student->date_of_birth = $request->date_of_birth;
        $request->password != null ? $student->password = Hash::make($request->password): $request->password = null;
        $student->class__id = $request->class__id;

        $student->save();

        return redirect()->route('admin.students.index')
            ->with('update', 'Mokinys - ' . $request->first_name . ' ' . $request->last_name . ' atnaujintas!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->back()
            ->with('destroy', 'Studentas - ' . $student->first_name . ' ' . $student->last_name . ' ištrintas!');
    }
}