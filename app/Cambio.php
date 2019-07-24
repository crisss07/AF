<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cambio extends Model
{
    protected $fillable = [
		'fecha',
		'tcambio',
		'ufv'		
	];
}
