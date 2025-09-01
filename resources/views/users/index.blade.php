@extends('layouts.admin')

@section('page_title','Usuarios')

@section('page_content')
<a href="{{ route('users.create') }}" class="btn btn-primary mb-2">Nuevo Usuario</a>

@if(session('ok'))
<div class="alert alert-success">{{ session('ok') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $u)
        <tr>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->roles->pluck('name')->join(', ') }}</td>
            <td>
                <a href="{{ route('users.edit',$u) }}" class="btn btn-sm btn-secondary">Editar</a>
                <form action="{{ route('users.destroy',$u) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}
@endsection
