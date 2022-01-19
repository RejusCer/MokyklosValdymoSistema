@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
    <script src="{{ asset('js/InRange.js') }}" defer></script>
@endsection

@section('content')
    <div class="users_table">
        <div class="head justify-content-between align-items-center">
            <p class="">Įrašyti pažymiai: {{ $grades->count() }}</p>
        </div>
        <div class="head justify-content-between align-items-center">
            <p>Vidurkis: {{ $avarage }}</p>
            <p>{{ $lesson->subject }} | {{ $student->first_name }}</p>
        </div>
        @if ($grades->count() === 0)
            Pažymių nėra
        @else

        <x-Table.grade :items="$grades" />

        @endif
    </div>
@endsection