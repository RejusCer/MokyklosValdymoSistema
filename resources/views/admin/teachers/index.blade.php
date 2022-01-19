@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <div class="head justify-content-between align-items-center">
            <form action="{{ route('admin.teachers.create') }}" method="get">
                <button type="submit" class="btn btn-outline-dark">Pridėti mokytoją</button>
            </form>

            <x-Feedback />
            
            <p class="">Iš viso mokytojų: {{ $teachers->count() }}</p>
        </div>
        
        <x-Table.teacher :items="$teachers" />
    </div>
@endsection