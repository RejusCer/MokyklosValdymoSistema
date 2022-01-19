@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <div class="head justify-content-between align-items-center">
            <form action="{{ route('admin.classes.create') }}" method="GET">
                <button type="submit" class="btn btn-outline-dark">Pridėti klasę</button>
            </form>

            <x-Feedback />
            
            <p class="">Klasių skaičius: {{ $classes->count() }}</p>
        </div>
        
        <x-Table.class :classes="$classes" />
    </div>
@endsection