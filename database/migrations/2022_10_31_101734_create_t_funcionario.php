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
        Schema::create('t_funcionario', function (Blueprint $table) {
            $table->id();
            $table->string('numero_ci')->unique();
            $table->string('complemento')->nullable();
            $table->string('expedido')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno');
            $table->string('nombres');
            $table->string('fecha_nacimiento')->nullable();
            $table->string('direccion')->nullable();
            $table->string('celular')->nullable();
            $table->string('fecha_registro');
            $table->string('firma_id')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('estado_formulario')->nullable();
            $table->BigInteger('id_usuario')->unsigned();
            $table->BigInteger('id_unidad')->nullable()->unsigned();
            $table->BigInteger('id_cargo')->nullable()->unsigned();
            $table->BigInteger('id_fiscalia')->nullable()->unsigned();
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('t_usuarios')->onDelete('cascade');
            $table->foreign('id_unidad')->references('id')->on('t_unidades')->onDelete('cascade');
            $table->foreign('id_cargo')->references('id')->on('t_cargos')->onDelete('cascade');
            $table->foreign('id_fiscalia')->references('id')->on('t_fiscalias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_funcionario');
    }
};
