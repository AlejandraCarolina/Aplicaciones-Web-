<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre');
            $table->unsignedBigInteger('categoria_id');
            $table->integer('cantidad');
            $table->decimal('precio_venta', 8, 2);
            $table->decimal('precio_compra', 8, 2);
            $table->text('color');
            $table->text('descripcion_corta')->nullable();
            $table->text('descripcion_larga')->nullable();
            $table->date('fecha_compra')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')->references('id_categoria')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');

    }
};
