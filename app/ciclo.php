<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ciclo extends Model
{
    protected $table ="ciclos";

    protected $fillable =['descripcion', 'activo'];

     public function grados()
    {
    	return $this->hasMany('App\grado');
    }
}
