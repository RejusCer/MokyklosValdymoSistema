@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/home.css') }}">
@endsection

@section('content')
    <div class="main">Mokyklos Valdymo Sistema</div>


    <div class="general">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="students">{{ $studentCount }} <p>Mokiniai</p></div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="teachers">{{ $teacherCount }} <p>Mokytojai</p></div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="classes">{{ $classesCount }} <p>Klasės</p></div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="lessons">{{ $lessonsCount }} <p>Pamokos</p></div>
            </div>
        </div>
    </div>

    
@endsection