@extends('layouts.admin')

@section('page_title', 'Detalle del envío')

@section('page_content')
<h3>Envío: {{ $envio->codigo }}</h3>

<ul class="list-group">
    <li class="list-group-item"><strong>Fecha:</strong> {{ $envio->fecha }}</li>
    <li class="list-group-item"><strong>Origen:</strong> {{ $envio->origen }}</li>
    <li class="list-group-item"><strong>Destino:</strong> {{ $envio->destino }}</li>
    <li class="list-group-item"><strong>Servicio:</strong> {{ $envio->servicio }}</li>
    <li class="list-group-item"><strong>Estado:</strong> {{ $envio->estado }}</li>
    <li class="list-group-item"><strong>Remitente:</strong> {{ $envio->nombre_remitente }} - {{ $envio->telefono_remitente }}</li>
    <li class="list-group-item"><strong>Destinatario:</strong> {{ $envio->nombre_destinatario }} - {{ $envio->telefono_destinatario }}</li>
    <li class="list-group-item"><strong>Descripción:</strong> {{ $envio->descripcion }}</li>
    <li class="list-group-item"><strong>Costo:</strong> ${{ $envio->costo }}</li>
</ul>

<a href="{{ route('envios.index') }}" class="btn btn-secondary mt-3">Regresar</a>
<a href="{{ route('envios.print', $envio) }}" class="btn btn-primary mt-3">Imprimir Comprobante</a>
@endsection
