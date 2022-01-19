<?php

namespace App\Http\Controllers\student;

use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $lessonsCount = Lesson::where('class_id', '=', Auth::guard('student')->user()->class__id)->count();
    
        return view('student.home',[
            'lessonsCount' => $lessonsCount
        ]);
    }
}
