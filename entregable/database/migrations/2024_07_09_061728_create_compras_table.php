<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id('id_compra');
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('producto_id');
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->date('fecha_compra');
            $table->decimal('descuento', 5, 2)->nullable();
            $table->timestamps();

            // claves foráneas
            $table->foreign('proveedor_id')->references('id_proveedor')->on('proveedores');
            $table->foreign('producto_id')->references('id_producto')->on('productos');

    
        });
    }

    /**
     * Reverse the migrations.
     */
    
     public function down()
     {
        /* Schema::table('compras', function (Blueprint $table) {
             // Eliminar claves foráneas antes de eliminar la tabla
             $table->dropForeign(['id_proveedor']);
             $table->dropForeign(['id_producto']);
         });*/
 
         Schema::dropIfExists('compras');
     }
};

