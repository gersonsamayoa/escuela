<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Roketin\Auditing\AuditingTrait;

class grado extends Model
{
  use AuditingTrait; //Vamos a auditar la tabla grado
    protected $table ="grados";

    protected $fillable =['nombre', 'grado', 'cantidadbimestres', 'nivel_id', 'ciclo_id', 'created_at'];

    public function alumnos()
    {
    	return $this->hasMany('App\alumno');
    }

    public function cursos()
    {
    	return $this->hasMany('App\curso');
    }

    public function nivel()
    {
      return $this->belongsTo('App\nivel', 'nivel_id');
    }

    public function ciclo()
    {
      return $this->belongsTo('App\ciclo', 'ciclo_id');
    }

    public static function grados($id){
        $ciclos=ciclo::where('activo', 1)->first(); /*Ciclo Activo*/
      return grado::where('nivel_id', '=', $id)->where('ciclo_id', $ciclos->id)->orderBy('nombre','ASC')->orderBy('grado', 'ASC')->get();
    }

    public static function grados2($id){
        $ciclos=ciclo::where('activo', 1)->first(); /*Ciclo Activo*/
      return grado::where('ciclo_id', $ciclos->id)->orderBy('nombre','ASC')->orderBy('grado', 'ASC')->get();
    }
}
