<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $studentCount = Auth::guard('teacher')->user()->countPupils;
        Auth::guard('teacher')->user()->class_ == null 
            ? $classesCount = 'Neturi klasės' : $classesCount = Auth::guard('teacher')->user()->class_->id;
        $lessonsCount = Auth::guard('teacher')->user()->lesson->count();

        return view('teacher.home',[
            'studentCount' => $studentCount,
            'classesCount' => $classesCount,
            'lessonsCount' => $lessonsCount
        ]);
    }
}
