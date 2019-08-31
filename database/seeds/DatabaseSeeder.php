<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsuariosTableSeeder::class);
        $this->call(NivelesTableSeeder::class);
        $this->call(CiclosTableSeeder::class);

        Model::reguard();
    }
}
