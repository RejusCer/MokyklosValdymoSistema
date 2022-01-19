@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <form class="row g-3" action="{{ route('student.comments.create') }}" method="POST">
            @csrf
            <div class="col-12">
                <label for="title" class="form-label">Komentaro pavadinimas</label>
                <input type="text" class="form-control" name="title" id="title" 
                    @error('title') style="border: 2px solid red;" @enderror>
                @error('title')
                    <div class="form-text text-danger">Įveskite komentaro pavadinimą</div>
                @enderror
            </div>

            <div class="col-12">
                <label for="description" class="form-label">Turinys</label>
                <input type="text" class="form-control" name="description" id="description" 
                    @error('description') style="border: 2px solid red;" @enderror>
                @error('description')
                    <div class="form-text text-danger">Įveskite komentaro turinį</div>
                @enderror
            </div>

            <div class="col-12">
                <label for="teacher" class="form-label">Žinutės gavėjas</label>
                <select class="form-select" name="teacher_id">
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-warning">Paskelbti komentarą</button>
            </div>
        </form>
    </div>
@endsection