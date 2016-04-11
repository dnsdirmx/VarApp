<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recomendacion extends Model
{

	protected $table = 'recomendaciones';

    public function orden()
    {
		return $this->BelongsTo('App\Orden');
	}

	public function imagenes()
	{
		return $this->belongsToMany('App\ImagenRecomendacion','imagen_recomendacion');
	}
}
