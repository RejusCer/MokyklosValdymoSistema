@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
    <script src="{{ asset('js/InRange.js') }}" defer></script>
@endsection

@section('content')
    <div class="users_table">
        <div class="head justify-content-between align-items-center">
            <form action="{{ route('teacher.grades', [$lesson, $student]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-dark btn-sm">Įrašyti pažymį</button>
                <input type="number" name="grade" id="grade" value="1" style="width: 44px;">
            </form>
            
            

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