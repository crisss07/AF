<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
		
		'nombre',
		'ap_pat',		
		'ap_mat',
		'ci',
		'cargo',
		'oficina'
	];
}
