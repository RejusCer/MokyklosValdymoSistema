@props(['students' => $students])

<table class="table table-hover">
    <thead>
        <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Tel. Numeris</th>
            <th>El. Paštas</th>
            @if (Auth::guard('teacher')->user()->is_admin)
                <th>Klasė</th> 
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->tel_number }}</td>
                <td>{{ $student->email }}</td>
                @if (Auth::guard('teacher')->user()->is_admin) 
                    <td>{{ $student->class__id }}</td>
                @endif

                @if (Auth::guard('teacher')->user()->is_admin)
                    <td>
                        <form action="{{ route('admin.students.destroy', $student) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Ištrinti</button>
                        </form>
                        <form action="{{ route('admin.students.edit', $student) }}" method="get">
                            <button type="submit" class="btn btn-primary btn-sm">Redaguoti</button>
                        </form>
                    </td>
                @endif
                
                @if (!Auth::guard('teacher')->user()->is_admin)
                    <td>
                        <form action="{{ route('teacher.comments.create', $student) }}" method="GET">
                            <button class="btn btn-outline-success btn-sm" type="submit">Parašyti žinutę</button>
                        </form>
                    </td>
                @endif
                
            </tr>
        @endforeach
    </tbody>
</table>