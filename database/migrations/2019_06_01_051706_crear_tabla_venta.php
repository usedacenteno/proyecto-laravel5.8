<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id','fk_venta_persona')->references('id')->on('persona')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id','fk_venta_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
            $table->string('tipo_comprobante',20);
            $table->string('serie_comprobante',7);
            $table->string('num_comprobante',10);
            $table->dateTime('fecha_hora');
            $table->decimal('impuesto',4,2);
            $table->decimal('tatal_venta',11,2);
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
        Schema::dropIfExists('venta');
    }
}
