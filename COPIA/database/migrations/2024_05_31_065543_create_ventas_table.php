<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('id_venta');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('cliente_id');
            $table->date('fecha_venta');
            $table->decimal('subtotal', 8, 2);
            $table->decimal('iva', 8, 2);
            $table->decimal('total', 8, 2);
            $table->timestamps();

            $table->foreign('producto_id')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id_categoria')->on('categorias')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id_cliente')->on('clientes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
