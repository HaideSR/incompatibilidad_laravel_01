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
        Schema::create('t_afinidad', function (Blueprint $table) {
            $table->id();

            $table->string('nombres');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');

            $table->BigInteger('id_funcionario')->unsigned();
            $table->BigInteger('id_parentesco')->unsigned();

            $table->timestamps();

            $table->foreign('id_funcionario')->references('id')->on('t_funcionario')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_parentesco')->references('id')->on('t_funcionario')->onDelete('cascade')->onUpdate('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_afinidad');
    }
};
