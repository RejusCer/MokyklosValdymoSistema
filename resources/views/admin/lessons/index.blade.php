@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <div class="head justify-content-between align-items-center">
            <form action="{{ route('admin.lessons.create') }}" method="get">
                <button type="submit" class="btn btn-outline-dark">Pridėti pamoką</button>
            </form>

            <x-Feedback />
            
            <p class="">Pamokų skaičius: {{ $lessons->count() }}</p>
        </div>
        
        <x-Table.lesson :lessons="$lessons" />
    </div>
@endsection