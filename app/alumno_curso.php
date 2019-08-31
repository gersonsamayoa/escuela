<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno_curso extends Model
{
  protected $table ="alumno_curso";

  protected $fillable =['bim1','bim2','bim3', 'bim4', 'cantidad_bimestres', 'promedio', 'alumno_id', 'curso_id'];

  public function alumno()
  {
    return $this->belongsTo('App\alumno');
  }

  public function curso()
  {
    return $this->belongsTo('App\curso');
  }
}
