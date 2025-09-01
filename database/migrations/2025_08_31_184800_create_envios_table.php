<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('envios', function (Blueprint $table) {
    $table->id();
    $table->string('codigo')->unique();          // p.ej. PQTAZN
    $table->date('fecha')->nullable();
    // Remitente
    $table->string('nombre_remitente');
    $table->string('ine_remitente')->nullable();
    $table->string('telefono_remitente');
    $table->string('direccion_remitente')->nullable();
    // Destinatario
    $table->string('nombre_destinatario');
    $table->string('telefono_destinatario');
    // Ruta/servicio
    $table->string('origen');
    $table->string('destino');                   // p.ej. OZ / TQ / TH
    $table->string('unidad')->nullable();
    $table->time('hora')->nullable();
    $table->enum('servicio', ['DIR','RAP','ORD']);
    // Otros
    $table->text('descripcion')->nullable();
    $table->decimal('costo', 8, 2)->default(0);
    $table->enum('estado', ['registrado','en_ruta','entregado','cancelado'])->default('registrado');

    $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // quien lo registró
    $table->timestamps();
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envios');
    }
};
