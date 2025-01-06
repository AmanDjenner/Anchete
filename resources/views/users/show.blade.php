@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalii Utilizator</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Nume</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Instituție</th>
            <td>{{ $user->institution->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Divizie</th>
            <td>{{ $user->division->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Rol</th>
            <td>{{ $user->role->name ?? 'N/A' }}</td>
            <tr>
            <th>Permisiuni utilizator</th>
            <td>
                @foreach ($user->permissions as $permission)
                {{ $user->permission->name }}

                @endforeach
                </td>
            </tr>
            <tr>
                <th>Permisiuni</th>
                <td>
                    @if ($user->role && $user->role->permissions)
                        @foreach ($user->role->permissions as $permission)
                        
                            {{ $permission->name }}<br>
                        @endforeach
                    @else
                        Nicio permisiune asociată.
                    @endif
                </td>
            </tr>

        </td>



        </tr>
    </table>
    <a href="{{ route('users.index') }}" class="btn btn-primary">Înapoi</a>
</div>dd($user);
@endsection
