<!-- resources/views/permissions/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista Permisiunilor</h1>

    <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Adaugă Permisiune</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('permissions.bulkUpdate') }}" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select-all"></th>
                    <th>ID</th>
                    <th>Nume</th>
                    <th>Acțiuni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td><input type="checkbox" name="permissions[]" value="{{ $permission->id }}"></td>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm">Editează</a>
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Actualizează Permisiunile Selectate</button>
    </form>
</div>

<script>
    document.getElementById('select-all').addEventListener('click', function(e) {
        var checkboxes = document.querySelectorAll('input[name="permissions[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = e.target.checked);
    });
</script>
@endsection
