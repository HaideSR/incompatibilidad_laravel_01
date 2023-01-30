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
        Schema::create('t_parientes_mp', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('parentesco');
            $table->string('fiscalia_otro');
            $table->string('direccion_jefatura_unidad');
            $table->BigInteger('id_funcionario')->unsigned();
            $table->BigInteger('id_mp_si_no')->unsigned();

            $table->timestamps();

            $table->foreign('id_funcionario')->references('id')->on('t_funcionario')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_mp_si_no')->references('id')->on('t_mp_si_no')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_parientes_mp');
    }
};
