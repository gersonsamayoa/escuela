<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Grados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grado');
            $table->string('nombre');
            $table->integer('cantidadbimestres');
            $table->integer('nivel_id')->unsigned();
           
            $table->foreign('nivel_id')->references('id')->on('niveles')->onDelete('cascade');
           
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('grados');
    }
}
