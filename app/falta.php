<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class falta extends Model
{
    protected $table ="faltas";

    protected $fillable =['descripcion'];
  
    public function alumno_faltas()
      {
          return $this->hasMany('App\alumno_falta');
      }
}
