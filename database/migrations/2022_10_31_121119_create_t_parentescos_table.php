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
        Schema::create('t_parentescos', function (Blueprint $table) {
            $table->id();
            $table->string('parentesco');
            $table->BigInteger('id_grado')->unsigned();
            $table->BigInteger('id_tipoParentesco')->unsigned();
            $table->timestamps();
            $table->foreign('id_grado')->references('id')->on('t_grado')->onDelete('cascade');
            $table->foreign('id_tipoParentesco')->references('id')->on('tipo_parentescos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_parentescos');
    }
};
