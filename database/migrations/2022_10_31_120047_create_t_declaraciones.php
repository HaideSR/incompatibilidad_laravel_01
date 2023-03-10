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
        Schema::create('t_declaraciones', function (Blueprint $table) {
            $table->id();
            $table->string('numero_ci');
            $table->string('fecha_declaracion');
            $table->string('motivo');
            $table->string('archivo');
            $table->BigInteger('id_funcionario')->unsigned();
            $table->timestamps();
            $table->foreign('id_funcionario')->references('id')->on('t_funcionario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_declaraciones');
    }
};
