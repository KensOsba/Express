<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style>
* { font-family: monospace; margin:0; padding:0; box-sizing:border-box; }
body { background:#f5f5f5; padding:20px; }
.ticket { width: 300px; margin:auto; background:#fff; padding:15px; border:1px solid #000; }
h2, h3 { text-align:center; margin:5px 0; }
hr { border:none; border-top:1px dashed #000; margin:8px 0; }
.row { display:flex; justify-content:space-between; margin-bottom:5px; }
.label { font-weight:bold; }
.small { font-size:12px; }
.barcode { text-align:center; margin:10px 0; }
.signature { margin-top:10px; text-align:center; }
</style>
</head>
<body>
<div class="ticket">
  <h2>ENVÍOS EXPRESS</h2>
  <h3>Código: {{ $envio->codigo }}</h3>
  <div class="row">
    <div class="label">Importe:</div>
    <div>${{ number_format($envio->costo,2) }}</div>
  </div>
  <hr>

  <div class="small label">FECHA:</div>
  <div class="small">{{ optional($envio->fecha)->format('Y-m-d') ?? now()->toDateString() }}</div>

  <hr>
  <div class="small label">ENVÍA</div>
  <div class="small">Nombre: {{ $envio->nombre_remitente }}</div>
  <div class="small">INE: {{ $envio->ine_remitente }}</div>
  <div class="small">Tel: {{ $envio->telefono_remitente }}</div>
  <div class="small">Dirección: {{ $envio->direccion_remitente }}</div>

  <hr>
  <div class="small label">RECIBE</div>
  <div class="small">Nombre: {{ $envio->nombre_destinatario }}</div>
  <div class="small">Tel: {{ $envio->telefono_destinatario }}</div>

  <hr>
  <div class="row">
    <div class="small label">ORIGEN:</div>
    <div class="small">{{ strtoupper($envio->origen) }}</div>
  </div>
  <div class="row">
    <div class="small label">DESTINO:</div>
    <div class="small">{{ strtoupper($envio->destino) }}</div>
  </div>
  <div class="row">
    <div class="small label">UNIDAD:</div>
    <div class="small">{{ $envio->unidad }}</div>
  </div>
  <div class="row">
    <div class="small label">HORA:</div>
    <div class="small">{{ $envio->hora }}</div>
  </div>
  <div class="row">
    <div class="small label">SERVICIO:</div>
    <div class="small">{{ $envio->servicio }}</div>
  </div>

  <hr>
  <div class="small label">DESCRIPCIÓN DEL ENVÍO</div>
  <div class="small">{{ $envio->descripcion }}</div>

  <div class="barcode">
    {!! DNS1D::getBarcodeHTML($envio->codigo, 'C128', 2, 50) !!}
    <div class="small">{{ $envio->codigo }}</div>
  </div>

  <div class="signature">
    Firma: ________________________________
  </div>

  <hr>
  <div class="small">
    De acuerdo al art. 18 del reglamento de Paquetería y Mensajería de la SCT.  
    No enviamos materiales o sustancias prohibidas.  
    Envíos EXPRESS no se hace responsable por paquetes con valor mayor a $1500 MXN.
  </div>
</div>
</body>
</html>
