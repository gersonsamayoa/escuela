<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno_falta extends Model
{
    protected $table ="alumno_falta";

    protected $fillable =['fecha','nombredocente','descripcion','alumno_id','falta_id'];


    public function alumno()
    {
    	return $this->belongsTo('App\alumno');
    }

    public function falta()
    {
        return $this->belongsTo('App\falta');
    } 
}
