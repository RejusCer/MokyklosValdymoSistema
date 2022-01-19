@props(['classes' => $classes])

<table class="table table-hover">
    <thead>
        <tr>
            <th>Klasė</th>
            <th>Auklėtojas</th>
            <th>Mokinių sk.</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($classes as $class)
            <tr>
                <td>{{ $class->id }}</td>
                <td>{{ $class->teacher->first_name }}</td>
                <td>{{ $class->student->count() }}</td>

                @if (Auth::guard('teacher')->user()->is_admin)
                    <td>
                        <form action="{{ route('admin.classes.destroy', $class) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Ištrinti</button>
                        </form>
                        <form action="{{ route('admin.classes.edit', $class) }}" method="get">
                            <button type="submit" class="btn btn-primary btn-sm">Keisti auklėtoja</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>