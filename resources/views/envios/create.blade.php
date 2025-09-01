@extends('layouts.admin')
@section('page_title','Nuevo envío')
@section('page_content')
<form method="POST" action="{{ route('envios.store') }}" class="card p-3">
@csrf
<div class="row">
  <div class="col-md-3">
    <label>Fecha</label>
    <input type="date" name="fecha" class="form-control" value="{{ old('fecha', now()->toDateString()) }}">
  </div>
  <div class="col-md-3">
    <label>Origen</label>
    <input name="origen" class="form-control" required value="{{ old('origen','ZONGOLICA') }}">
  </div>
  <div class="col-md-3">
    <label>Destino</label>
    <input name="destino" class="form-control" required placeholder="OZ / TQ / TH" value="{{ old('destino') }}">
  </div>
  <div class="col-md-3">
    <label>Servicio</label>
    <select name="servicio" class="form-control" required>
      <option value="DIR">DIRECTO</option>
      <option value="RAP">RAPIDO</option>
      <option value="ORD">ORDINARIO</option>
    </select>
  </div>
</div>

<hr>
<h5>Envia (Remitente)</h5>
<div class="row">
  <div class="col-md-4"><input name="nombre_remitente" class="form-control" placeholder="Nombre" required></div>
  <div class="col-md-4"><input name="ine_remitente" class="form-control" placeholder="INE (opcional)"></div>
  <div class="col-md-4"><input name="telefono_remitente" class="form-control" placeholder="Teléfono" required></div>
</div>
<div class="mt-2"><input name="direccion_remitente" class="form-control" placeholder="Dirección (opcional)"></div>

<hr>
<h5>Recibe (Destinatario)</h5>
<div class="row">
  <div class="col-md-6"><input name="nombre_destinatario" class="form-control" placeholder="Nombre" required></div>
  <div class="col-md-6"><input name="telefono_destinatario" class="form-control" placeholder="Teléfono" required></div>
</div>

<hr>
<div class="row">
  <div class="col-md-3"><input name="unidad" class="form-control" placeholder="Unidad"></div>
  <div class="col-md-3"><input type="time" name="hora" class="form-control"></div>
  <div class="col-md-3"><input type="number" step="0.01" name="costo" class="form-control" placeholder="Costo $" required></div>
</div>

<div class="mt-2">
  <label>Descripción del envío</label>
  <textarea name="descripcion" class="form-control" rows="2"></textarea>
</div>

<div class="mt-3 text-right">
  <button class="btn btn-primary">Guardar</button>
</div>
</form>
@endsection
