@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <div class="head justify-content-between align-items-center">
            <p class="">Įrašyti pažymiai: {{ $grades->count() }}</p>
        </div>
        
        <x-Table.grade :items="$grades" />
    </div>
@endsection