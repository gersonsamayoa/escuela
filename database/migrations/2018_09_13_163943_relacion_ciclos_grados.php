<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionCiclosGrados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grados', function($table){
            $table->integer('ciclo_id')->nullable()->unsigned();

            $table->foreign('ciclo_id')->references('id')->on('ciclos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grados', function($table){
        $table->dropForeign('grados_ciclo_id_foreign');
        });
    }
}
