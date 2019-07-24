<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Actiapro;
use App\Asignacion;

class Asign extends Model
{
    protected $fillable = [
		
		'actiapro_id',
		'asignacion_id'
	];


	public function actiapro()
	{
		return $this->belongsTo(Actiapro::class);
	}


	public function asignacion()
	{
		return $this->belongsTo(Asignacion::class);
	}


}
