@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/home.css') }}">
@endsection

@section('content')
    <div class="main">Mokyklos Valdymo Sistema</div>


    <div class="general">
        <div class="row">
            <div class="col-6">
                <div class="lessons">{{ Auth::guard('student')->user()->class__id }} <p>Klasė</p></div>
            </div>
            <div class="col-6">
                <div class="lessons">{{ $lessonsCount }} <p>Pamokos</p></div>
            </div>
        </div>
    </div>

@endsection