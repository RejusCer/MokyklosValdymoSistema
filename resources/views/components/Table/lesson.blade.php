@props(['lessons' => $lessons])

<table class="table table-hover">
    <thead>
        <tr>
            <th>Pamoka</th>
            @if (Auth::guard('teacher')->check())
                <th>Klasė</th>
                @if (Auth::guard('teacher')->user()->is_admin)
                    <th>Mokytojas</th>
                @endif
            @endif
            @if (Auth::guard('student')->check())
                <th>Mokytojas</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($lessons as $lesson)
            <tr>
                <td>{{ $lesson->subject }}</td>
                @if (Auth::guard('teacher')->check())
                    <td>{{ $lesson->class->id }}</td>
                    @if (Auth::guard('teacher')->user()->is_admin)
                        <td>{{ $lesson->teacher->first_name }}</td>
                    @endif
                @endif
                @if (Auth::guard('student')->check())
                    <td>{{ $lesson->teacher->first_name }}</td>
                @endif

                @if (Auth::guard('teacher')->check())
                    @if (Auth::guard('teacher')->user()->is_admin)
                        <td>
                            <form action="{{ route('admin.lessons.destroy', $lesson) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Ištrinti</button>
                            </form>
                            {{-- <form action="{{ route('admin.lessons.update', $lesson) }}" method="get">
                                <button type="submit" class="btn btn-primary btn-sm">Redaguoti</button>
                            </form> --}}
                        </td>
                    @endif
                    
                    @if (!Auth::guard('teacher')->user()->is_admin)
                        <td>
                            <form action="{{ route('teacher.lessons.view', $lesson) }}" method="get">
                                <button type="submit" class="btn btn-primary btn-sm">Apžiūrėti</button>
                            </form>
                        </td>
                    @endif
                @endif

                @if (Auth::guard('student')->check())
                    <td>
                        <form action="{{ route('student.grades', $lesson) }}" method="get">
                            <button type="submit" class="btn btn-primary btn-sm">Apžiūrėti</button>
                        </form>
                    </td>
                @endif
    
            </tr>
        @endforeach
    </tbody>
</table>