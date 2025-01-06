@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalii roles</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nume:</strong> {{ $name }}</li>
    </ul>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary mt-3">Înapoi</a>
</div>
@endsection
