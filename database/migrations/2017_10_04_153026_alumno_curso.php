<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnoCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('alumno_curso', function (Blueprint $table){
        $table->increments('id');
        $table->decimal('bim1', 8, 0)->nullable();
        $table->decimal('bim2', 8, 0)->nullable();
        $table->decimal('bim3', 8, 0)->nullable();
        $table->decimal('bim4', 8, 0)->nullable();
        $table->integer('cantidad_bimestres')->nullable();
        $table->decimal('promedio', 8, 0)->nullable();
        $table->integer('alumno_id')->unsigned();
        $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
        $table->integer('curso_id')->unsigned();
        $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
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
        Schema::drop('alumno_curso');
    }
}
