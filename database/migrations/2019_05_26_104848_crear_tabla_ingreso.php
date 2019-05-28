<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaIngreso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso', function (Blueprint $table) {
            $table->bigIncrements('idingreso');
            $table->unsignedInteger('idproveedor');
            $table->string('tipo_coprobante',20);
            $table->string('serie_comprobante',7);
            $table->string('num:comprobante',10);
            $table->dateTime('fecha_hora');
            $table->decimal('impuesto',4,2);
            $table->string('estado',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingreso');
    }
}
