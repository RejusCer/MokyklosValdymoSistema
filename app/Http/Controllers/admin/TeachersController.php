<?php

namespace App\Http\Controllers\admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    public function index()
    {
        // paima visus mokytojus is DB
        $teachers = Teacher::all();

        //ddd($teachers->toArray());

        return view('admin.teachers.index', [
            'teachers' => $teachers,
        ]);
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    // makytojo išsaugojimas į DB
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:teachers',
            'tel_number' => 'required',
            'password' => 'required|min:3'
        ]);

        Teacher::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'tel_number' => $request->tel_number,
            'date_of_birth' => $request->date_of_birth,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin == "on" ? true : false,
        ]);

        return redirect()->route('admin.teachers.index')
            ->with('store', 'Mokytojas - ' . $request->first_name . ' ' . $request->last_name . ' pridėtas!');
    }

    public function edit(Teacher $teacher)
    {  
        return view('admin.teachers.update', [
            'teacher' => $teacher,
        ]);
    }
    public function update(Teacher $teacher, Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'tel_number' => 'required',
            'date_of_birth' => 'required'
        ]);

        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->email = $request->email;
        $teacher->tel_number = $request->tel_number;
        $teacher->date_of_birth = $request->date_of_birth;
        $request->password != null ? $teacher->password = Hash::make($request->password): $request->password = null;
        $teacher->is_admin = $request->is_admin == "on" ? true : false;

        $teacher->save();

        return redirect()->route('admin.teachers.index')
            ->with('update', 'Mokytojas - ' . $request->first_name . ' ' . $request->last_name . ' atnaujintas!');
    }

    // istrinti mokytoja
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->back()
            ->with('destroy', 'Mokytojas - ' . $teacher->first_name . ' ' . $teacher->last_name . ' ištrintas!');
    }
}
