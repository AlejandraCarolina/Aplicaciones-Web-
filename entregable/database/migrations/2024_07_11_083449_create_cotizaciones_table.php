<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id('id_cotizacion');
            $table->Integer('producto_id');
            $table->Integer('cliente_id');
            $table->date('fecha_cot');
            $table->string('vigencia');
            $table->string('cantidad');
            $table->string('comentarios');
            $table->timestamps();

              // claves foráneas
            $table->foreign('producto_id')->references('id_proveedor')->on('cotizaciones');
            $table->foreign('cliente_id')->references('id_cliente')->on('clientes');
  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
