@extends('layouts.admin')

@section('page_title', 'Crear Usuario')

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

<form method="POST" action="{{ route('users.store') }}" class="card p-3">
    @csrf
    <div class="mb-2">
        <label>Nombre</label>
        <input name="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <div class="mb-2">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="mb-2">
        <label>Contraseña</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Rol</label>
        <select name="role" class="form-control" required>
            @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Guardar</button>
</form>
@endsection
