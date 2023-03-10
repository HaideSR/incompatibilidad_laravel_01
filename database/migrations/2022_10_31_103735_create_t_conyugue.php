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
        Schema::create('t_conyugue', function (Blueprint $table) {
            $table->id();

            $table->string('numero_ci')->unique();
            $table->string('complemento')->nullable();
            $table->string('expedido');
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno');
            $table->string('nombres');
            $table->string('direccion');
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
        Schema::dropIfExists('t_conyugue');
    }
};
