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
        Schema::create('t_estado_verificacion', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('codigo')->unique();
            $table->string('archivo');
            $table->string('archivo_digital_cd')->nullable();
            $table->boolean('estado_aprobacion_cd');
            $table->string('estado_proceso')->nullable();
            $table->string('archivo_firmado')->nullable();
            $table->string('estado_tramite')->nullable();
            $table->BigInteger('id_motivodeclaracion')->unsigned();
            $table->BigInteger('id_funcionario')->unsigned();
            $table->timestamps();

            $table->foreign('id_funcionario')->references('id')->on('t_funcionario')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_motivodeclaracion')->references('id')->on('t_motivo_declaracion')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_estado_verificacion');
    }
};
