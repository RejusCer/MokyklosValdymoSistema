@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <form class="row g-3" action="{{ route('admin.classes.update', $class) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="teacher" class="form-label">Klasės auklėtoja</label>
                <select class="form-select" name="teacher_id">
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-warning">Išsaugoti pakeitimus</button>
            </div>
        </form>
    </div>
@endsection