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
        Schema::create('t_niveles_permisos', function (Blueprint $table) {
            //$table->id();

            $table->string('nombre');
            $table->string('permiso');
            $table->BigInteger('id_usuarionivel')->unsigned();

            $table->timestamps();

            $table->foreign('id_usuarionivel')->references('id')->on('t_usuario_nivels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_niveles_permisos');
    }
};
