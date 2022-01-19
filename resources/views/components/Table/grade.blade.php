@props(['items' => $items])

<table class="table table-hover">
    <thead>
        <tr>
            <th>Pažymys</th>
            @if (!Auth::guard('student')->check())
                <th>Pamoka</th>
                <th>Mokinys</th>
            @endif
            <th>Įrašo data</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->grade }}</td>
                @if (!Auth::guard('student')->check())
                    <td>{{ $item->lesson->subject }}</td>
                    <td>{{ $item->student->first_name }}</td>
                @endif
                <td>{{ $item->created_at->toDateString() }}</td>
                
                {{-- <td>
                    <form action="{{ route('grades.destroy', $item) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Ištrinti</button>
                    </form>
                </td> --}}

                @if (Auth::guard('teacher')->check())
                    @if (!Auth::guard('teacher')->user()->is_admin)
                        <td>
                            <form action="{{ route('teacher.grades.destroy', $item) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Ištrinti</button>
                            </form>
                        </td>
                    @endif
                @endif

            </tr>
        @endforeach
    </tbody>
</table>