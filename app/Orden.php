<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
	protected $fillable = [
        'clase','orden',
    ];
    
	protected $table = 'ordenes';

    public function especies()
    {
        return $this->hasMany('App\Especie');
	}
	public function imagenes()
	{
		return $this->belongsToMany('App\ImagenOrden','imagen_orden');
	}

	public function recomendaciones()
	{
		return $this->hasMany('App\Recomendacion');
	}
}
