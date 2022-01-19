@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/disableToggleButtons.css') }}">
    <script src="{{ asset('js/disableButtons.js') }}" defer></script>
@endsection

@section('content')
    <div class="users_table">
        @if (session('update'))
            <span class="text-success">{{session('update')}}</span>
        @endif
        <form class="row g-3" action="{{ route('admin.teachers.update', $teacher) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="container">
                <label for="names" class="form-label">Vardas ir pavardė</label>
                <div class="input-group" id="names">
                    <span class="input-group-text" id="toggler">Pakeisti vardą ir pavardę</span>
                    <input type="text" class="form-control" name="first_name" id="first_name" disabled
                        @error('first_name') style="border: 2px solid red;" @enderror value="{{ $teacher->first_name }}">

                    <input type="text" class="form-control" name="last_name" id="last_name" disabled
                        @error('last_name') style="border: 2px solid red;" @enderror value="{{ $teacher->last_name }}">
                </div>
            </div>
            <div class="container">
                <label for="email" class="form-label">El. Paštas</label>
                <div class="input-group" id="email">
                    <span class="input-group-text" id="toggler">Pakeisti El. Paštą</span>
                    <input type="email" class="form-control" name="email" id="email"  disabled
                        @error('email') style="border: 2px solid red;" @enderror value="{{ $teacher->email }}">
                </div>
            </div>
            <div class="container">
                <label for="tel_number" class="form-label">Telefono numneris</label>
                <div class="input-group" id="tel_number">
                    <span class="input-group-text" id="toggler">Pakeisti tel. num.</span>
                    <input type="text" class="form-control" name="tel_number" id="tel_number"  disabled
                        @error('tel_number') style="border: 2px solid red;" @enderror value="{{ $teacher->tel_number }}">
                </div>
            </div>
            <div class="container">
                <label for="password" class="form-label">Slaptažodis</label>
                <div class="input-group" id="password">
                    <span class="input-group-text" id="toggler">Pakeisti slaptažodis</span>
                    <input type="password" class="form-control" name="password" id="password" disabled>
                </div>
            </div>
            <div class="container">
                <label for="date_of_birth" class="form-label">Gimimo data</label>
                <div class="input-group" id="date_of_birth">
                    <span class="input-group-text" id="toggler">Pakeisti datą</span>
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" disabled
                        @error('date_of_birth') style="border: 2px solid red;" @enderror value="{{ $teacher->date_of_birth }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin"
                        value="{{ $teacher->is_admin }}">
                    <label class="form-check-label" for="is_admin">Administratorius</label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-warning" id="updateButton">Atnaujinti mokytoją</button>
            </div>
        </form>
    </div>
@endsection