@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="styles/users.css">
@endsection

@section('content')
    <div class="users_table">
        @auth('teacher')
            <p>Vardas: <b>{{ Auth::guard('teacher')->user()->first_name }}</b></p>
            <p>Pavardė: <b>{{ Auth::guard('teacher')->user()->last_name }}</b></p>
            <p>El. Laiškas: <b>{{ Auth::guard('teacher')->user()->email }}</b></p>
            <p>Tel. Numeris: <b>{{ Auth::guard('teacher')->user()->tel_number }}</b></p>
            <p>Gimimo metai: <b>{{ Auth::guard('teacher')->user()->date_of_birth }}</b></p>
        @endauth

        @auth('student')
            <p>Vardas: <b>{{ Auth::guard('student')->user()->first_name }}</b></p>
            <p>Pavardė: <b>{{ Auth::guard('student')->user()->last_name }}</b></p>
            <p>El. Laiškas: <b>{{ Auth::guard('student')->user()->email }}</b></p>
            <p>Tel. Numeris: <b>{{ Auth::guard('student')->user()->tel_number }}</b></p>
            <p>Gimimo metai: <b>{{ Auth::guard('student')->user()->date_of_birth }}</b></p>
            <p>Klasė: <b>{{ Auth::guard('student')->user()->class__id }}</b></p>
        @endauth
    </div>
@endsection