@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/users.css') }}">
@endsection

@section('content')
    <div class="users_table">
        <div class="head justify-content-between align-items-center">
            <form action="{{ route('admin.students.create') }}" method="get">
                <button type="submit" class="btn btn-outline-dark">Pridėti studentą</button>
            </form>
            
            <x-Feedback />

            <p class="">Iš viso studėntų: {{ $students->total() }}</p>
        </div>

        <script>
            $(document).ready(function(){
                $("input").keyup(function(){
                    $.ajax({
                        url: "students/student_search",
                        data: { searchText: $(this).val() },
                        success: function(result){
                            $(".table-content").html(result);
                        }
                    });
                });
            });
        </script>
        
        <input type="text">
        
        <div class="table-content">
            <x-Table.student :students="$students" />

            {{ $students->links('pagination::bootstrap-4') }}
        </div>

    </div>
@endsection