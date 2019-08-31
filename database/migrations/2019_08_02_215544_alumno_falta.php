<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnoFalta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_falta', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('nombredocente', 120);
            $table->text('descripcion');
          
            $table->integer('alumno_id')->unsigned();
            $table->integer('falta_id')->unsigned();
            
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreign('falta_id')->references('id')->on('faltas')->onDelete('cascade');
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
        Schema::drop('alumno_falta');
    }
}
