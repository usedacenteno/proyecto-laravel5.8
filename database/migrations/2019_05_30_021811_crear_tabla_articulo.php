<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaArticulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id','fk_articulo_categoria')->references('id')->on('categoria')->onDelete('restrict')->onUpdate('restrict');
            $table->string('codigo',50);
            $table->string('nombre',100);
            $table->integer('stock');
            $table->string('descripcion',512)->nullable();
            $table->string('imagen',50)->nullable();
            $table->string('estado',20);
            $table->timestamps();
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo');
    }
}
