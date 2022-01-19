<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Class_;
use App\Models\Student;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function view()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // prijungia vartotoją
        if (!Auth::guard($request->type)->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) 
        {
            return back()->with('fail', 'Nepavyko prisijungti');
        } 

        // kad nereikėtu sukurti atskirų funkcijų kiekvienam guard'ui. Kad tesiog naudotu: Auth::logout()
        Auth::shouldUse($request->type);

        //$request->session()->regenerate();

        if ($request->type === 'student')
        {
            $userType = 'student.';
        }
        else if ($request->type === 'teacher' && Auth::guard('teacher')->user()->is_admin)
        {
            $userType = 'admin.';
        }
        else
        {
            $userType = 'teacher.';
        }

        //session(['userType' => $userType]);

        return redirect()->route($userType . 'home');
    }

    public function logoutUser(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
