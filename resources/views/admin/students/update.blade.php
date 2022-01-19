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
        <form class="row g-3" action="{{ route('admin.students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="container">
                <label for="names" class="form-label">Vardas ir pavardė</label>
                <div class="input-group" id="names">
                    <span class="input-group-text" id="toggler">Pakeisti vardą ir pavardę</span>
                    <input type="text" class="form-control" name="first_name" id="first_name" 
                        placeholder="@error('first_name') Įveskite vardą @enderror" disabled
                        @error('first_name') style="border: 2px solid red;" @enderror value="{{ $student->first_name }}">

                    <input type="text" class="form-control" name="last_name" id="last_name" 
                        placeholder="@error('first_name') Įveskite vardą @enderror" disabled disabled
                        @error('last_name') style="border: 2px solid red;" @enderror value="{{ $student->last_name }}">
                </div>
            </div>
            <div class="container">
                <label for="email" class="form-label">El. Paštas</label>
                <div class="input-group" id="email">
                    <span class="input-group-text" id="toggler">Pakeisti El. Paštą</span>
                    <input type="email" class="form-control" name="email" id="email" 
                        placeholder="@error('email') Įveskite El. Paštą @enderror" disabled
                        @error('email') style="border: 2px solid red;" @enderror value="{{ $student->email }}">
                </div>
            </div>
            <div class="container">
                <label for="tel_number" class="form-label">Telefono numneris</label>
                <div class="input-group" id="tel_number">
                    <span class="input-group-text" id="toggler">Pakeisti tel. num.</span>
                    <input type="text" class="form-control" name="tel_number" id="tel_number" 
                        placeholder="@error('tel_number') Įveskite tel. numerį @enderror" disabled
                        @error('tel_number') style="border: 2px solid red;" @enderror value="{{ $student->tel_number }}">
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
                        @error('date_of_birth') style="border: 2px solid red;" @enderror value="{{ $student->date_of_birth }}">
                </div>
            </div>
            <input type="hidden" name="class__id" value="{{ $student->class__id }}">
            <div class="col-12">
                <button type="submit" class="btn btn-warning" id="updateButton">Atnaujinti studentą</button>
            </div>
        </form>
    </div>
@endsection