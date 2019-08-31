<?php

use Illuminate\Database\Seeder;

class CiclosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table ('ciclos')->insert([
            'descripcion'  =>'2019',
            'activo' =>'1'
            ]);
    }
}
