@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <div class="head justify-content-between align-items-center">
            <p>{{ $lesson->subject }} | {{ $lesson->class_id }}</p>
            <p class="">Iš viso studėntų: {{ $students->count() }}</p>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Vardas</th>
                    <th>Pavardė</th>
                    <th>Tel. Numeris</th>
                    <th>El. Paštas</th>
                    <th>G. Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->tel_number }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->date_of_birth }}</td>
                        <td>
                            <form action="{{ route('teacher.grades', [$lesson, $student]) }}" method="get">
                                <button type="submit" class="btn btn-primary btn-sm">Peržiūrėti pažymius</button>
                            </form>
                            <form action="{{ route('teacher.comments.create', $student) }}" method="GET">
                                <button class="btn btn-outline-success btn-sm" type="submit">Parašyti žinutę</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <table>
            <thead>
                <th>Eil num</th>
                <th>Mokiniai</th>

                <th>
                    <p>21</p>
                    <p>11</p>
                    <p>29</p>
                </th>
                <th>
                    <p>21</p>
                    <p>11</p>
                    <p>30</p>
                </th>
            </thead>

            <tbody>
                <td>1</td>
                <td>Gabija janusdadsf</td>
                
                <td>7</td>
                <td>8</td>
            </tbody>
        </table> --}}
    </div>
@endsection