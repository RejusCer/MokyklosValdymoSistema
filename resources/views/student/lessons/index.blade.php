@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <div class="head justify-content-between align-items-center">
            @if (session('store'))
                <span class="text-success">{{session('store')}}</span>
            @endif
            @if (session('destroy'))
                <span class="text-danger">{{session('destroy')}}</span>
            @endif
            <p class="">Pamokų skaičius: {{ $lessons->count() }}</p>
        </div>

        <x-Table.lesson :lessons="$lessons" />

    </div>
@endsection