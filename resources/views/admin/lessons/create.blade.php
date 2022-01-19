@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <form class="row g-3" action="{{ route('admin.lessons.store') }}" method="POST">
            @csrf
            <div class="col-12">
                <label for="subject" class="form-label">Pamokos pavadinimas</label>
                <input type="text" class="form-control" name="subject" id="subject" 
                    @error('subject') style="border: 2px solid red;" @enderror>
                @error('subject')
                    <div class="form-text text-danger">Įveskite pamokos pavadinimą</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="teacher" class="form-label">Mokoma klasė</label>
                <select class="form-select" name="class">
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="teacher" class="form-label">Pamokos mokytoja</label>
                <select class="form-select" name="teacher">
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-warning">Pridėti pamoką</button>
            </div>
        </form>
    </div>
@endsection