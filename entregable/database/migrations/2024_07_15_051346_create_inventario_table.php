<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarioTable extends Migration
{
    public function up()
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->id('id_inventario');
            $table->unsignedBigInteger('producto_id');
            $table->enum('movimiento', ['entrada', 'salida']);
            $table->date('fecha_entrada');
            $table->date('fecha_salida')->nullable();
            $table->integer('cantidad');
            $table->text('descripcion')->nullable();
            $table->timestamps();

            $table->foreign('producto_id')->references('id_producto')->on('productos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventario');
    }
}