@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <form class="row g-3" action="{{ route('admin.comments.update', $comment) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-12">
                <label for="title" class="form-label">Komentaro pavadinimas</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $comment->title }}">
            </div>

            <div class="col-12">
                <label for="description" class="form-label">Turinys</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ $comment->description }}">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-warning">Redaguoti komentarą</button>
            </div>
        </form>
    </div>
@endsection