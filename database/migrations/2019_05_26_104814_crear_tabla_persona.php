<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->bigIncrements('idpersona');
            $table->varchar('tipo_persona',20);
            $table->varchar('nombre', 100);
            $table->varchar('tipo_documento',20);
            $table->varchar('num_documento',15);
            $table->varchar('direccion',70);
            $table->varvhar('telefono', 15);
            $table->varchar('email',50);
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
        Schema::dropIfExists('persona');
    }
}
