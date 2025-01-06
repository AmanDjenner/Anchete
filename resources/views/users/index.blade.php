@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista Utilizatorilor</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Adaugă Utilizator</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nume</th>
                <th>Email</th>
                <th>Instituție</th>
                <th>Divizie</th>
                <th>Rol</th>
                <th>Acțiuni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->institution->name ?? 'N/A' }}</td>
                    <td>{{ $user->division->name ?? 'N/A' }}</td>
                    <td>{{ $user->role->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Vizualizează</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Editează</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Ești sigur?')">Șterge</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection
