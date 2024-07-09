<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendedoresTable extends Migration
{
   
    public function up(): void
    {
        Schema::create('vendedores', function (Blueprint $table) {
            $table->id('id_vendedor');
            $table->string('nombre');
            $table->string('correo');
            $table->string('telefono');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('vendedores');
    }
};

