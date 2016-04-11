<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especimen extends Model
{
	protected $fillable = [
        'estado','sexo'];

	protected $table = 'especimenes';
    public function reporte()
    {
        return $this->BelongsTo('App\Reporte');
	}

	public function especie()
	{
		return $this->BelongsTo('App\Especie');
	}
}
