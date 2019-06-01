<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDetalleingreso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleingreso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('articulo_id');
            $table->foreign('articulo_id','fk_detalleingreso_articulo')->references('id')->on('articulo')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('ingreso_id');
            $table->foreign('ingreso_id','fk_detalleingreso_ingreso')->references('id')->on('ingreso')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('cantidad');
            $table->decimal('precio_compra',11,2);
            $table->decimal('precio_venta',11,2);
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
        Schema::dropIfExists('detalleingreso');
    }
}
