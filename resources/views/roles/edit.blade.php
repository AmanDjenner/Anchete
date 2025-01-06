@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editează Rolul</h1>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nume rol</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $role->name) }}" required>
        </div>

        <div class="form-group">
            <label>Permisiuni</label>
            <div class="row">
                @foreach ($permissions as $permission)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="permission-{{ $permission->id }}"
                                name="permissions[]"
                                value="{{ $permission->id }}"
                                @if(in_array($permission->id, $rolePermissions)) checked @endif
                            >
                            <label class="form-check-label" for="permission-{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvează</button>
    </form>

    <a href="{{ route('roles.index') }}" class="btn btn-secondary mt-3">Înapoi</a>
</div>
@endsection
