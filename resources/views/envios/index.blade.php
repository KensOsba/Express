@extends('layouts.admin')
@section('page_title','Envíos')
@section('page_content')
<a href="{{ route('envios.create') }}" class="btn btn-primary mb-2">Nuevo envío</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Código</th><th>Fecha</th><th>Origen</th><th>Destino</th>
      <th>Servicio</th><th>Estado</th><th></th>
    </tr>
  </thead>
  <tbody>
  @foreach($envios as $e)
    <tr>
      <td>{{ $e->codigo }}</td>
      <td>{{ $e->fecha }}</td>
      <td>{{ $e->origen }}</td>
      <td>{{ $e->destino }}</td>
      <td>{{ $e->servicio }}</td>
      <td>{{ $e->estado }}</td>
      <td>
        <a href="{{ route('envios.show',$e) }}" class="btn btn-sm btn-secondary">Ver</a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
{{ $envios->links() }}
@endsection
