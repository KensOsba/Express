@extends('layouts.admin')

@section('page_title', 'Editar Usuario')

@section('page_content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('users.update', $user) }}" class="card p-3">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label>Nombre</label>
        <input name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
    </div>
    <div class="mb-2">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
    </div>
    <div class="mb-2">
        <label>Contraseña</label>
        <input type="password" name="password" class="form-control">
        <small>Dejar vacío para mantener la contraseña actual</small>
    </div>
    <div class="mb-2">
        <label>Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>
    <div class="mb-2">
        <label>Rol</label>
        <select name="role" class="form-control" required>
            @foreach($roles as $role)
            <option value="{{ $role->name }}" {{ $user->roles->contains('name', $role->name) ? 'selected' : '' }}>
                {{ ucfirst($role->name) }}
            </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Actualizar</button>
</form>
@endsection
