<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'fecha',
        'nombre_remitente',
        'ine_remitente',
        'telefono_remitente',
        'direccion_remitente',
        'nombre_destinatario',
        'telefono_destinatario',
        'origen',
        'destino',
        'unidad',
        'hora',
        'servicio',
        'descripcion',
        'costo',
        'estado',
        'user_id'
    ];
}