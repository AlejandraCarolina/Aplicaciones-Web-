<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id('id_compra');
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->date('fecha_compra');
            $table->timestamps();
        });
    }

     public function down()
     {
       
         Schema::dropIfExists('compras');
     }
};
