<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    protected $table ="alumnos";

    protected $fillable =['id', 'fecha', 'nombres','apellidos', 'fechanacimiento', 'carnet', 'correlativo', 'grado_id'];

    public function grado()
    {
    	return $this->belongsTo('App\grado');
    }

    public function alumno_faltas()
    {
    	return $this->hasMany('App\alumno_falta');
    }

       public function scopeSearch($query, $nombres)
    {
        if(trim($nombres)!="")
        {
        return $query->where(\DB::raw("CONCAT(nombres, ' ', apellidos, ' ',carnet)"),'LIKE', "%$nombres%");
        }
    }

    public function scopeBuscar($query, $grado_id)
    {
      return $query->where('grado_id', '=', "$grado_id");
    }

    public function cursos()
    {
    	return $this->belongsToMany('App\curso')->withPivot('bim1', 'bim2', 'bim3', 'bim4', 'promedio')->withTimestamps();
    }

    public function alumnos_cursos()
    {
      return $this->hasMany('App\alumno_curso');
    }

}
