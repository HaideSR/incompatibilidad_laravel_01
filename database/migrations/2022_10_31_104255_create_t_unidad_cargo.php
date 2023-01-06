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
        Schema::create('t_unidad_cargo', function (Blueprint $table) {
            $table->id();

            $table->string('unidad');
            $table->string('cargo');
            $table->BigInteger('id_fiscalia')->unsigned();

            $table->timestamps();

            $table->foreign('id_fiscalia')->references('id')->on('t_fiscalias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_unidad_cargo');
    }
};
