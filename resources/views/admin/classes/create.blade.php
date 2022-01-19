@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <form class="row g-3" action="{{ route('admin.classes.store') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="id" class="form-label">Klasės ID</label>
                <input type="text" class="form-control" name="id" id="id" 
                    @error('id') style="border: 2px solid red;" @enderror>
                @error('id')
                    <div class="form-text text-danger">Įveskite klasės ID</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="teacher" class="form-label">Klasės auklėtoja</label>
                <select class="form-select" name="teacher_id" @error('teacher_id') style="border: 2px solid red;" @enderror>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->last_name }}</option>
                    @endforeach
                </select>
                @error('teacher_id')
                    <div class="form-text text-danger">Pasirinkite mokytoja kuris bus klasės auklėtojas</div>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-warning">Pridėti klasę</button>
            </div>
        </form>
    </div>
@endsection