@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista roles</h1>
    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Adaugă roles</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nume</th>
                <th>Acțiuni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($role as $roles)
                <tr>
                    <td>{{ $roles->id }}</td>
                    <td>{{ $roles->name }}</td>
                    <td>
                        <a href="{{ route('roles.show', $roles->id) }}" class="btn btn-info btn-sm">Vezi</a>
                        <a href="{{ route('roles.edit', $roles->id) }}" class="btn btn-warning btn-sm">Editează</a>
                        <form action="{{ route('roles.destroy', $roles->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
