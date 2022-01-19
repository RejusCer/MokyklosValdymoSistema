<?php

namespace App\Http\Controllers\admin;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradesController extends Controller
{
    public function index()
    {
        $grades = Grade::with('lesson', 'student')->get();

        return view('admin.grades.index', [
            'grades' => $grades
        ]);
    }
}
