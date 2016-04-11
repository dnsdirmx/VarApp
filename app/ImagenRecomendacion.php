<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Imagen;
class ImagenRecomendacion extends Imagen
{	
	public function recomendacion()
	{
		return $this->belongsToMany('App\Recomendacion','imagen_recomendacion');
	}
}
