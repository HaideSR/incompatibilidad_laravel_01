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
        Schema::create('t_motivo_declaracion', function (Blueprint $table) {
            $table->id();

            $table->string('motivo');
            $table->BigInteger('id_declaraciones')->unsigned();

            $table->timestamps();
            $table->foreign('id_declaraciones')->references('id')->on('t_declaraciones')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_motivo_declaracion');
    }
};
