<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre');
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('categoria_id');
            $table->decimal('precio_venta', 8, 2);
            $table->decimal('precio_compra', 8, 2);
            $table->date('fecha_venta')->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')->references('id_categoria')->on('categorias');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
