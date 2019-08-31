<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
  protected $table ="cursos";

  protected $fillable =['id','nombre', 'grado_id'];

  public function grado()
  {
      return $this->belongsTo('App\grado');
  }

  public function scopeBuscar($query, $grado_id)
  {

    return $query->where('grado_id', 'LIKE', "%$grado_id%");
  }

  public function alumnos()
  {
    return $this->belongsToMany('App\alumno')->withPivot('bim1', 'bim2', 'bim3', 'bim4', 'promedio')->withTimestamps();
  }

  public function alumnos_cursos()
  {
    return $this->hasMany('App\alumno_curso');
  }

}
