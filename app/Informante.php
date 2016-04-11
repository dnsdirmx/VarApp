<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informante extends Model
{
    protected $fillable = [
	        'nombre','email','telefono',
		];

	protected $table = 'responsables';

	public function reportes()
	{
		return $this->hasMany('App\Reporte');
	}
}
