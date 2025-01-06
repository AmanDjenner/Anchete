{{-- resources/views/division/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adaugă o institutie Nouă</h1>

    <form action="{{ route('institutions.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nume</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvează</button>
    </form>
</div>
@endsection
