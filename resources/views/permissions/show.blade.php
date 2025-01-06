<!-- resources/views/permissions/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Permisiune Detalii</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $permission->id }}</li>
        <li class="list-group-item"><strong>Nume:</strong> {{ $permission->name }}</li>
    </ul>
    <a href="{{ route('permissions.index') }}" class="btn btn-primary mt-3">Înapoi la Lista Permisiunilor</a>
</div>
@endsection
