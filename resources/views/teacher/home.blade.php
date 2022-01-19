@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/home.css') }}">
@endsection

@section('content')
    <div class="main">Mokyklos Valdymo Sistema</div>


    <div class="general">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="teachers">{{ $studentCount }} <p>Mokiniai</p></div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="classes">{{ $lessonsCount }} <p>Pamokos</p></div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="lessons">{{ $classesCount }} <p>Klasė</p></div>
            </div>
        </div>
    </div>

@endsection