<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grupo;
use App\Auxiliar;

class Activo extends Model
{
    protected $fillable = [
		
		'codigo_anterior',
		'codigo_actual',
		'grupo_id',
		'auxiliar_id',
		'descripcion',
		'color',
		'material_marca',
		'modelo_medida',
		'serie',
		'procesador',
		'memoria_ram',
		'disco_duro',
		'estado',
		'valor',
		'fuente_financiamiento',
		'fecha_compra',
		'ufv',
		'observaciones'
	];

	public function grupo()
	{
		return $this->belongsTo(Grupo::class);
	}

	public function auxiliar()
	{
		return $this->belongsTo(Auxiliar::class);
	}
}
