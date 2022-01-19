@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/comments.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <div class="head justify-content-between align-items-center">
            <form action="{{ route('student.comments.create') }}" method="GET">
                <button class="btn btn-outline-dark" type="submit">Parašyti komentarą</button>
            </form>
            
            <x-Feedback />

            <p class="">Komentarų skaičius: {{ $comments->count() }}</p>

        </div>

        <div class="comments">
            @foreach ($comments as $comment)
                <div class="comment">
                    <div class="container justify-content-between comment-head">
                        <span class="title">{{ $comment->title }}</span>
                        <span class="data">{{ $comment->created_at->toDateString() }}</span>
                    </div>
                    <div class="container description">
                        {{ $comment->description }}
                    </div>
                    <div class="container d-flex">
                        <div class="container adressees">
                            Mokytojas: {{ $comment->teacher->first_name }} | Studentas: {{ $comment->student->first_name }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
@endsection