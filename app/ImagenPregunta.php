<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Imagen;
class ImagenPregunta extends Imagen
{	
	public function pregunta()
	{
		return $this->belongsToMany('App\Pregunta','imagen_pregunta');
	}
}
