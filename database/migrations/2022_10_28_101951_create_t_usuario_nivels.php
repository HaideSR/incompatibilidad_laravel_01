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
        Schema::create('t_usuario_nivels', function (Blueprint $table) {
            $table->id();

            $table->string('nombreusuario');
            //$table->unsignedInteger('id_usuario');
            $table->BigInteger('id_usuario')->unsigned();

            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('t_usuarios')->onDelete('cascade')->onUpdate('cascade');



            //$table->foreignId('id_usuario')->references('id')->on('t_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_usuario_nivels');
    }
};
