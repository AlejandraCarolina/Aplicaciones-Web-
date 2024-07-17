<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('inventario', function (Blueprint $table) {
            $table->date('fecha_entrada')->nullable()->change();
            $table->date('fecha_salida')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('inventario', function (Blueprint $table) {
            $table->date('fecha_entrada')->nullable(false)->change();
            $table->date('fecha_salida')->nullable(false)->change();
        });
    }
};
