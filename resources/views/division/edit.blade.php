{{-- resources/views/division/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editează Diviziunea: {{ $division->name }}</h1>

    <form action="{{ route('divisions.update', $division->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nume</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $division->name }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Actualizează</button>
    </form>
</div>
@endsection
