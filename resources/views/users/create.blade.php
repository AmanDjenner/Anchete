@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Adăugare Utilizator</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nume Utilizator</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Introduceți numele" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Introduceți email-ul" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Parolă</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Introduceți parola" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmare Parolă</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirmați parola" required>
        </div>
        <div class="mb-3">
            <label for="role_id" class="form-label">Rol</label>
            <select name="role_id" class="form-select" id="role_id">
                <option value="">Selectați un rol existent</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <div class="mt-2">
                <label for="new_role" class="form-label">Adăugați un Rol Nou</label>
                <input type="text" name="new_role" class="form-control" id="new_role" placeholder="Introduceți un rol nou (opțional)">
            </div>
        </div>
        <div class="mb-3">
            <label for="institution_id" class="form-label">Instituție</label>
            <select name="institution_id" class="form-select" id="institution_id">
                <option value="">Selectați o instituție</option>
                @foreach ($institutions as $institution)
                    <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="division_id" class="form-label">Divizie</label>
            <select name="division_id" id="division_id" class="form-select" required>
                <option value="">Selectați o divizie</option>
                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Permisiuni</label>
            <div>
                @foreach ($permissions as $permission)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission_{{ $permission->id }}">
                        <label class="form-check-label" for="permission_{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Creează Utilizator</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Înapoi</a>
        </div>
    </form>

    <!-- Afișare erori -->
    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
