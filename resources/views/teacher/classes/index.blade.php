@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        @if ($students != null)
            <div class="head justify-content-between align-items-center">
                <p>Klasė : <b>{{ $students[0]->class__id }}</b></p>
                <p class="">Mokinių skaičius: {{ $students->count() }}</p>
            </div>

            <x-Table.student :students="$students" />
        @else
            Mokytojas neturi priskirtos klasės
        @endif
        
    </div>
@endsection