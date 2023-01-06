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
        Schema::create('t_mp_si_no', function (Blueprint $table) {
            $table->id();

            $table->string('grado'); 
            $table->string('estado'); 
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
        Schema::dropIfExists('t_mp_si_no');
    }
};
