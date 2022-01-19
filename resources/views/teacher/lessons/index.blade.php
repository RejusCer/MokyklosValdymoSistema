@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <div class="head justify-content-between align-items-center">
            
            <x-Feedback />

            <p class="">Pamokų skaičius: {{ $lessons->count() }}</p>
        </div>
        
        <x-Table.lesson :lessons="$lessons" />
        
    </div>
@endsection