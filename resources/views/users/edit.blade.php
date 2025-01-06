@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editează Utilizator</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nume</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Parolă (lasă gol pentru a nu schimba)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="institution_id" class="form-label">Instituție</label>
            <select name="institution_id" id="institution_id" class="form-control">
                <option value="">Selectează</option>
                @foreach($institutions as $institution)
                    <option value="{{ $institution->id }}" @if($user->institution_id == $institution->id) selected @endif>{{ $institution->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="division_id" class="form-label">Divizie</label>
            <select name="division_id" id="division_id" class="form-control">
                <option value="">Selectează</option>
                @foreach($divisions as $division)
                    <option value="{{ $division->id }}" @if($user->division_id == $division->id) selected @endif>{{ $division->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="role_id" class="form-label">Rol</label>
            <select name="role_id" id="role_id" class="form-control">
                <option value="">Selectează</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" @if($user->role_id == $role->id) selected @endif>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizează</button>
    </form>
</div>
@endsection
