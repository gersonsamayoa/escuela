<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table ('users')->insert([
          'name'  =>'Gerson Samayoa',
          'email' =>'gersonsamayoa@gmail.com',
          'password'  =>bcrypt('sysadmon'),
          'type'      =>'admin',
      ]);

      DB::table ('users')->insert([
          'name'  =>'Alma Botello',
          'email' =>'allisbe@hotmail.com',
          'password'  =>bcrypt('allisbe'),
          'type'      =>'director',
      ]);

      DB::table ('users')->insert([
          'name'  =>'Sonia Taracena',
          'email' =>'soniataracena@gmail.com',
          'password'  =>bcrypt('soniataracena'),
          'type'      =>'secretaria',
      ]);
    }
}
