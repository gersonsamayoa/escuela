<?php

use Illuminate\Database\Seeder;

class NivelesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('niveles')->insert([
        'nombre'  =>'Pre Primaria'
      ]);
        DB::table('niveles')->insert([
          'nombre'  =>'Primaria'
        ]);

    }
}
