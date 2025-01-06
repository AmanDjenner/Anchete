@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista Diviziunilor</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nume</th>
                <th>Acțiuni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($divisions as $division)
                <tr>
                    <td>{{ $division->id }}</td>
                    <td>{{ $division->name }}</td>
                    <td>
                        <!-- Butoane pentru Acțiuni -->
                        <a href="{{ route('divisions.show', $division->id) }}" class="btn btn-info btn-sm">Vezi</a>
                        <a href="{{ route('divisions.edit', $division->id) }}" class="btn btn-warning btn-sm">Editează</a>
                        <form action="{{ route('divisions.destroy', $division->id) }}" method="POST" style="display:inline-block;">
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
