<!-- resources/views/permissions/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editare Permisiune</h1>

    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nume</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $permission->name) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizează Permisiunea</button>
    </form>
</div>
@endsection
