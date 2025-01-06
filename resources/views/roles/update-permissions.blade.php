{{-- resources/views/roles/update-permissions.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Permisiuni pentru Rolul: {{ $role->name }}</h1>
    <form action="{{ route('roles.updatePermissions', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-check">
            @foreach($permissions as $permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                    @if($role->permissions->contains($permission->id)) checked @endif>
                    <label class="form-check-label" for="permission_{{ $permission->id }}">
                        {{ $permission->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizează Permisiunile</button>
    </form>

</div>
@endsection
