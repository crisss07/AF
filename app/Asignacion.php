<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $fillable = [
		
		'fecha',
		'piso',
		'persona_id'
		
	];
}
