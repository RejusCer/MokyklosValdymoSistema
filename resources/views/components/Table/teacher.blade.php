@props(['items' => $items])

@if ($items->count())
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>El. Paštas</th>
                <th>Tel. Numeris</th>
                <th>Administratorius</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->tel_number }}</td>
                    
                    @if ($item->is_admin)
                        <td>Taip</td>
                        <td></td>
                    @else
                        <td>Ne</td>
                        <td>
                            <form action="{{ route('admin.teachers.destroy', $item) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Ištrinti</button>
                            </form>
                        </td>
                    @endif
                    <td>
                        <form action="{{ route('admin.teachers.edit', $item) }}" method="get">
                            <button type="submit" class="btn btn-primary btn-sm">Redaguoti</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    Mokytojai nerasti
@endif