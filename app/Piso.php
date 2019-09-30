<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grupo;

class Piso extends Model
{

  protected $fillable = [
  'piso'
];

/*public function grupo()
{
  return $this->belongsTo(Grupo::class);
}

public function auxiliar()
{
  return $this->belongsTo(Auxiliar::class);
}*/


}
