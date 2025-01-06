@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista institutiilor</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nume</th>
                <th>Acțiuni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($institutions as $institution)
                <tr>
                    <td>{{ $institution->id }}</td>
                    <td>{{ $institution->name }}</td>
                    <td>
                        <!-- Butoane pentru Acțiuni -->
                        <a href="{{ route('institutions.show', $institution->id) }}" class="btn btn-info btn-sm">Vezi</a>
                        <a href="{{ route('institutions.edit', $institution->id) }}" class="btn btn-warning btn-sm">Editează</a>
                        <form action="{{ route('institutions.destroy', $institution->id) }}" method="POST" style="display:inline-block;">
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
