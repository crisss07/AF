<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grupo;
use App\Auxiliar;

class Actiapro extends Model
{
    protected $fillable = [
		
		'codigo_anterior',
		'codigo_actual',
		'fecha_compra',
		'ufv',
		'valor',
		'descripcion',
		'fuente_financiamiento',
		'grupo_id',
		'auxiliar_id',
		'estado',
		'color',
		'material_marca',
		'modelo_medida',
		'serie',
		'procesador',
		'memoria_ram',
		'disco_duro',
		'accesorios',
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
