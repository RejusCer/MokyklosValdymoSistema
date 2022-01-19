@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <form class="row g-3" action="{{ route('admin.students.store') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="first_name" class="form-label">Vardas</label>
                <input type="text" class="form-control" name="first_name" id="first_name" @error('first_name') style="border: 2px solid red;" @enderror value="{{ old('first_name') }}">
                @error('first_name')
                    <div class="form-text text-danger">Įveskite vardą</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label">Pavardė</label>
                <input type="text" class="form-control" name="last_name" id="last_name" @error('last_name') style="border: 2px solid red;" @enderror value="{{ old('last_name') }}">
                @error('last_name')
                    <div class="form-text text-danger">Įveskite pavardę</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="email" class="form-label">El. Paštas</label>
                <input type="email" class="form-control" name="email" id="email" @error('email') style="border: 2px solid red;" @enderror value="{{ old('email') }}">
                @error('email')
                    <div class="form-text text-danger">Įveskite El. Paštą</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="tel_number" class="form-label">Telefono numeris</label>
                <input type="text" class="form-control" name="tel_number" id="tel_number" @error('tel_number') style="border: 2px solid red;" @enderror value="{{ old('tel_number') }}">
                @error('tel_number')
                    <div class="form-text text-danger">Įveskite numerį</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="password" class="form-label">Slaptažodis</label>
                <input type="password" class="form-control" name="password" id="password" @error('password') style="border: 2px solid red;" @enderror>
                @error('password')
                    <div class="form-text text-danger">Įveskite slaptažodį</div>
                @enderror
            </div>
            <div class="col-16">
                <label for="class" class="form-label">Klasė</label>
                <select class="form-select" name="class_id">
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->id }}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="date_of_birth" value="1999-01-01">
            <div class="col-12">
                <button type="submit" class="btn btn-warning">Pridėti studentą</button>
            </div>
        </form>
    </div>
@endsection