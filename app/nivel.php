<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nivel extends Model
{
  protected $table ="niveles";

  protected $fillable =['nombre'];

  public function grados()
  {
    return $this->hasMany('App\grado');
  }
}
