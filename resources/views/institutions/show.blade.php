@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalii institutie</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nume:</strong> {{ $name }}</li>
    </ul>
    <a href="{{ route('institutions.index') }}" class="btn btn-secondary mt-3">Înapoi</a>
</div>
@endsection
