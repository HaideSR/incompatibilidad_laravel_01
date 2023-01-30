<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_denuncia', function (Blueprint $table) {
            $table->id();

            $table->string('numero_ci');
            $table->string('fecha_denuncia');
            $table->string('nombres_apellidos');
            $table->string('fiscalia_otro');
            $table->string('direccion_jefatura_unidad');
            $table->string('detalles');
            $table->BigInteger('id_funcionario')->unsigned();

            $table->timestamps();

            $table->foreign('id_funcionario')->references('id')->on('t_funcionario')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_denuncia');
    }
};
